<?php
namespace Codeception\Module;

// here you can define custom functions for WebGuy 

class WebHelper extends \Codeception\Module
{
    public function seeMainNavigationWorking($I, $linkText, $linkURL)
    {
        $I->click($linkText);
        $I->seeCurrentUrlEquals($linkURL);
        $I->seeResponseCodeIs(200);
    }
}
