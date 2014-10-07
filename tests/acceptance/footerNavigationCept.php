<?php
$I = new WebGuy($scenario);
$I->wantTo('ensure the footer navigation links work');
$I->am('user');
$I->amOnPage('/');

// Test footer quick navigation
$I->seeMainNavigationWorking($I, '//ul[@id="footer-quick-nav"]/li[1]/a', '/');
$I->seeMainNavigationWorking($I, '//ul[@id="footer-quick-nav"]/li[2]/a', '/about');
$I->seeMainNavigationWorking($I, '//ul[@id="footer-quick-nav"]/li[3]/a', '/faq');
$I->seeMainNavigationWorking($I, '//ul[@id="footer-quick-nav"]/li[4]/a', '/contact-us');

