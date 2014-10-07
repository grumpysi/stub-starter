<?php
$I = new WebGuy($scenario);
$I->am("User");
$I->wantTo('trying to ensure that contact form works');

$I->amOnPage('/contact-us');
$I->seeCurrentUrlEquals('/contact-us');

$I->fillField('firstname', 'Simon');
$I->fillField("lastname", "Nicklin");
$I->fillField("email", "simon@njo.im");
$I->fillField("message", "This is a test message.  I am testing the contact form.");
$I->click("Send Message");

//$I->see("Thank you");

