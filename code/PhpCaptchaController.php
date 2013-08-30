<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PhpCaptchaController extends Controller {

    /**
     * Use this singelton to applay you custon configured PhpCaptcha class.
     * If this will be left unset the fields constructor will initialise
     * it with a defaul PhpCaptcha class.
     *
     * @var PhpCaptcha
     */
    private static $prototype;

    public static function get_php_captcha() {

		if(!PhpCaptchaController::$prototype) {
			require_once Director::baseFolder().
				'/phpcaptcha/code/php-captcha.inc.php';
			$f = array(
				Director::baseFolder().'/phpcaptcha/fonts/VeraIt.ttf',
				Director::baseFolder().'/phpcaptcha/fonts/VeraMono.ttf',
				Director::baseFolder().'/phpcaptcha/fonts/VeraSe.ttf',
				Director::baseFolder().'/phpcaptcha/fonts/VeraSeBd.ttf'
			);
			$p = new PhpCaptcha($f, 200, 58);
			$p->SetBackgroundImages(
				Director::baseFolder()."/phpcaptcha/images/bg1.jpeg");
			$p->UseColour(true);
			PhpCaptchaController::$prototype = $p;
		}

		return PhpCaptchaController::$prototype;
    }

    public static function genimage() {
	    PhpCaptchaController::get_php_captcha()->Create();
    }
}

?>
