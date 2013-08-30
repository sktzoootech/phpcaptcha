phpcaptcha
==========

## Maintainer Contact

Old Version:

 * Saophalkun Ponlu
   <phalkunz (at) silverstripe (dot) com>

 * Will Rossiter
   <will (at) fullscreen (dot) io>

This Version:

 * Davis Dimalen
   <davis (at) webtorque  (dot) com>
   
   
This is an old module originally developed for 2.3.  I had to do some minor tweaks to make it compatible with 3.0.5.  Unlike Captcha by google, phpcaptcha is easier to read and simple which means it is client friendly.

The original module can be downloaded from http://www.silverstripe.org/phpcaptcha-module/

## SS Version Requirements
3.0.5

## Installation Requirements

1. Download the Spam Protection module (http://www.silverstripe.org/spam-protection-module/)
2. Save it in your project root folder
3. Download this module and save it on your project root folder

## How to use

You can add a phpcaptcha field to your form by adding it to your FieldList. Example:

You can add the following snippet to your Controller (example Page_Controller). 

public function SampleForm() {

	$fields = FieldList::create(
		TextField::create('Amount', 'Amount (Testing Only):*')->setAttribute('placeholder', 'Amount'),
		TextField::create('FirstName', 'First name:*')->setAttribute('placeholder', 'First Name'),
		TextField::create('LastName', 'Last name:*')->setAttribute('placeholder', 'Last name'),
		EmailField::create('Email', 'Email:*')->setAttribute('placeholder', 'E-mail'),
		new PhpCaptchaField('Captcha', "Prove you aren't a Robot (enter the characters to the following field):*")
	);

	$validator = RequiredFields::create(array('FirstName', 'Amount', 'LastName'));
	$actions = FieldList::create(FormAction::create('processSampleForm', 'Submit Sample'));

	return new Form($this, 'SampleForm', $fields, $actions, $validator);
}

public function processSampleForm($data, Form $form){
	// $data contains values from the SampleForm form fields.
	// Process your data here
	
	Debug::dump($data);
	
	return null;
}