<?php

/**
 * Protecter class to handle spam protection interface 
 *
 * @package recaptcha
 */

class PhpCaptchaProtector implements SpamProtector {
	
	/**
	 * Return the Field that we will use in this protector
	 * 
	 * @return string
	 */
	function getFormField($name = "PhpCaptchaField", $title = "Captcha", $value = null, $form = null, $rightTitle = null) {
		return new PhpCaptchaField($name, $title, $value, $form, $rightTitle);
	}
	
	/**
	 * Needed for the interface. Recaptcha does not have a feedback loop
	 *
	 * @return boolean
	 */
	function sendFeedback($object = null, $feedback = "") {
		return false;
	}
}
