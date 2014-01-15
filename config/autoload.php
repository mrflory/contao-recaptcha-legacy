<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Recaptcha
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'FsInformatik',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Library
    'FsInformatik\ReCaptcha\Lib\Response'  => 'system/modules/recaptcha/library/Response.php',
    'FsInformatik\ReCaptcha\Lib\Exception' => 'system/modules/recaptcha/library/Exception.php',
    'FsInformatik\ReCaptcha\Lib\Captcha'   => 'system/modules/recaptcha/library/Captcha.php',
    
    //Classes
    'FsInformatik\ReCaptcha\ReCaptcha'     => 'system/modules/recaptcha/classes/ReCaptcha.php',
    
    //Forms
    'FsInformatik\ReCaptcha\FormCaptcha'   => 'system/modules/recaptcha/forms/FormCaptcha.php',
    'FsInformatik\ReCaptcha\FormReCaptcha' => 'system/modules/recaptcha/forms/FormReCaptcha.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'rec_custom_default' => 'system/modules/recaptcha/templates',
    'recaptcha'          => 'system/modules/recaptcha/templates',
));
