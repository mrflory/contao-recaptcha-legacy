<?php

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Florian Stallmann 2008 
 * @author     Florian Stallmann <info@fs-informatik.de>
 * @package    reCaptcha 
 * @license    LGPL 
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_layout']['recPublicKey']        = array('reCaptcha Public Key', 'Geben Sie Ihren öffentlichen Schlüssel für reCaptcha ein. Wenn Sie das Feld leer lassen, wird ein globaler Schlüssel verwendet. Ein Schlüsselpaar kann auf <a href="http://www.recaptcha.net/api/getkey">http://www.recaptcha.net/api/getkey</a> angefordert werden.');
$GLOBALS['TL_LANG']['tl_layout']['recPrivateKey']       = array('reCaptcha Private Key', 'Geben Sie Ihren privaten Schlüssel für reCaptcha ein. Wenn Sie das Feld leer lassen, wird ein globaler Schlüssel verwendet. Ein Schlüsselpaar kann auf <a href="http://www.recaptcha.net/api/getkey">http://www.recaptcha.net/api/getkey</a> angefordert werden.');
$GLOBALS['TL_LANG']['tl_layout']['recTheme']            = array('reCaptcha Theme', 'Wählen Sie den Stil, der von reCaptcha verwendet werden soll. Für den Stil custom müssen Sie ein Template erstellen.');
$GLOBALS['TL_LANG']['tl_layout']['recCustomTemplate']   = array('reCaptcha Custom Template', 'Wählen Sie das Custom Template, welches von reCaptcha verwendet werden soll.');
$GLOBALS['TL_LANG']['tl_layout']['recaptcha_legend']    = 'ReCaptcha Einstellungen';

?>
