<?php

/**
 * Polish (Poland) language pack
 * @package modules: phpcaptcha
 * @subpackage i18n
 */

i18n::include_locale_file('modules: phpcaptcha', 'en_US');

global $lang;

if(array_key_exists('pl_PL', $lang) && is_array($lang['pl_PL'])) {
	$lang['pl_PL'] = array_merge($lang['en_US'], $lang['pl_PL']);
} else {
	$lang['pl_PL'] = $lang['en_US'];
}

$lang['pl_PL']['PhpCaptchaField']['WRONG'] = "Tekst nie był taki sam jak ten na obrazku";

?>