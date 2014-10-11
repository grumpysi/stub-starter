<?php namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class KitSwitchCommand extends Command {

    protected function configure()
    {
        $kit = 0;
        $this->setName("kit:switch")
            ->setDescription("Switches to a new Starter-KIT.  Think of this as changing initial theme.")
            ->setDefinition(array(
                new InputOption('kit', 's', InputOption::VALUE_OPTIONAL, 'New KIT to switch to.', $kit),
            ))
            ->setHelp(<<<EOT
Switch to a new KIT (a Starter-KIT is a bundle of the main /app and /public folder).
kit id is the same as the folder name.

Usage:

<info>php stub kit:switch --kit=002</info>

EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        // Get kit id from input
        $kit = $input->getOption('kit');

        // Set unique folder name for backup of app and public folders
        $backup_folder = 'kits/backup/'.date("Y-m-d_h-i-s");

        // Set backup folder path
        $kit_folder = 'kits/simple/'.$kit;

        // Test if KIT id is valid
        if ( ($kit < 1) || ($kit > 999) ) {
            throw new \InvalidArgumentException('Starter KIT ID number should be between 1 and 999');
        }

        // Test if KIT folder exists
        if ( !file_exists($kit_folder) ) {
            throw new \InvalidArgumentException('Starter KIT folder does not exist');
        }

        // Start switch process
        $output->writeln('Switching to Starter KIT '.$kit.'');
        $output->writeln('');

        // Create backup folder
        mkdir($backup_folder);

        // Backup current /app folder
        $output->write('Backing up old /app folder... ');
        rename('app',$backup_folder.'/app');
        $output->writeln('<info>done</info>');

        // Backup current /public folder
        $output->write('Backing up old /public folder... ');
        rename('public',$backup_folder.'/public');
        $output->writeln('<info>done</info>');

        // Load new /app folder
        $output->write('Loading new /app folder... ');
        $this->copyDirectory($kit_folder.'/app','app');
        $output->writeln('<info>done</info>');

        // Load new /public folder
        $output->write('Loading new /public folder... ');
        $this->copyDirectory($kit_folder.'/public','public');
        $output->writeln('<info>done</info>');

        // Output completion message
        $output->writeln('');
        $output->writeln('<info>New KIT installation complete</info>');
    }

    protected static function copyDirectory($sourceDir, $targetDir)
    {
        if (!file_exists($sourceDir)) return false;
        if (!is_dir($sourceDir)) return copy($sourceDir, $targetDir);
        if (!mkdir($targetDir)) return false;
        foreach (scandir($sourceDir) as $item) {
            if ($item == '.' || $item == '..') continue;
            if (!self::copyDirectory($sourceDir.DIRECTORY_SEPARATOR.$item, $targetDir.DIRECTORY_SEPARATOR.$item)) return false;
        }
        return true;
    }
}