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
$GLOBALS['TL_LANG']['tl_layout']['recPublicKey']        = array('reCaptcha Public Key', 'Please enter your public key for reCaptcha. If you leave this field blank, a global key will be used. You can request a key pair at <a href="http://www.recaptcha.net/api/getkey">http://www.recaptcha.net/api/getkey</a>.');
$GLOBALS['TL_LANG']['tl_layout']['recPrivateKey']       = array('reCaptcha Private Key', 'Please enter your private key for reCaptcha. If you leave this field blank, a global key will be used. You can request a key pair at <a href="http://www.recaptcha.net/api/getkey">http://www.recaptcha.net/api/getkey</a>.');
$GLOBALS['TL_LANG']['tl_layout']['recTheme']            = array('reCaptcha Theme', 'Please choose the theme used by reCaptcha. For custom theme you have to create a template.');
$GLOBALS['TL_LANG']['tl_layout']['recCustomTemplate']   = array('reCaptcha Custom Template', 'Please choose the Custom Template used by reCaptcha.');
$GLOBALS['TL_LANG']['tl_layout']['recaptcha_legend']    = 'ReCaptcha settings';

?>
