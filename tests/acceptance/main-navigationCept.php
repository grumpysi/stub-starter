<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure the main navigation links work');
$I->am('user');
$I->amOnPage('/');


$I->seeMainNavigationWorking($I, 'Home', '/');
$I->seeMainNavigationWorking($I, 'About Us', '/about');
$I->seeMainNavigationWorking($I, 'Services', '/services');
$I->seeMainNavigationWorking($I, 'Portfolio', '/portfolio');
$I->seeMainNavigationWorking($I, 'Career', '/career');
$I->seeMainNavigationWorking($I, 'Blog Single', '/blog-single');
$I->seeMainNavigationWorking($I, 'FAQ', '/faq');
$I->seeMainNavigationWorking($I, 'Pricing', '/pricing');
$I->seeMainNavigationWorking($I, 'Registration', '/registration');
$I->seeMainNavigationWorking($I, 'Privacy Policy', '/privacy');
$I->seeMainNavigationWorking($I, 'Terms of Use', '/terms');
$I->seeMainNavigationWorking($I, 'Blog', '/blog');
$I->seeMainNavigationWorking($I, 'Contact', '/contact-us');

