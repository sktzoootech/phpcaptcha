<?php
/**
 * Provides an {@link FormField} which allows form to validate for non-bot submissions
 * by giving them a challenge to decrypt an image.
 *
 * @module phpcaptcha
 */
class PhpCaptchaField extends SpamProtectorField {

	public function __construct($name = "Captcha", $title = "Captcha",
		$value = null, $form = null, $rightTitle = null) {
		parent::__construct($name, $title, $value, $form, $rightTitle);
		
	}
	
	public function Field($properties = array()) {
		$properties = array(
			'type' => 'text',
			'class' => 'text' . ($this->extraClass() ? $this->extraClass() : ''),
			'id' => $this->id(),
			'name' => $this->getName(),
			'value' => $this->Value(),
			'tabindex' => $this->getAttribute('tabindex'),
			'maxlength' => ($this->maxLength) ? $this->maxLength : null,
			'size' => ($this->maxLength) ? min( $this->maxLength, 30 ) : null
		);

		if($this->disabled) $properties['disabled'] = 'disabled';

		return '<img src="'.Director::baseURL().
			'PhpCaptchaController/genimage" alt="captcha" /><br />'.
			$this->createTag('input', $properties);
	}

	/**
	 * Needed do satisfy the request handler
	 */
	public function setSession($session) {
		
	}
	
	/**
	 * Validate the PhpCaptcha code
	 *
	 * @param Validator $validator
	 * @return boolean
	 */
	public function validate($validator) {
		if(!PhpCaptcha::Validate($_REQUEST[$this->name])) {
			$validator->validationError(
				$this->getName(),
				_t(
					'PhpCaptchaField.WRONG',
					"The text you entered doesn't match the captcha. Please try again"
				),
				"validation",
				false
			);
			return false;
		}
		else {
			return true;
		}
	}
}