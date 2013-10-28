<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Florian Stallmann 2008-2012
 * @author     Florian Stallmann <info@fs-informatik.de>
 * @package    reCaptcha
 * @version    1.0.0
 * @license    LGPL
 * @filesource
 */

namespace FsInformatik\ReCaptcha;

/**
 * Class FormReCaptcha
 *
 * @copyright  Florian Stallmann 2008-2012
 * @author     Florian Stallmann <info@fs-informatik.de>
 * @package    Controller
 */
class FormReCaptcha extends \Widget
{

  /**
   * Template
   * @var string
   */
  protected $strTemplate = 'recaptcha';

  /**
   * Recaptcha library class
   * @var \Lib\Captcha
   */
  protected $reCaptcha;

  /**
   * Theme used by reCaptcha
   * @var string
   */
  protected $theme;

  /**
   * Initialize the object and in front-end, get the public an private key from page layout
   * @param array
   */
  public function __construct($arrAttributes=null)
  {
    parent::__construct($arrAttributes);
    
    $this->mandatory = true;
    $this->arrAttributes['required'] = true;

    if (TL_MODE == 'BE')
    {
      return;
    }
    
    global $objPage;
    $layout = $this->getPageLayout($objPage);
    
    $this->reCaptcha = new Lib\Captcha();
    $this->reCaptcha->setSsl($this->Environment->ssl);

    //Use keys only if both are set, else default keys
    if(strlen($layout->recPublicKey) && strlen($layout->recPrivateKey))
    {
      $this->reCaptcha->setPublicKey($layout->recPublicKey);
      $this->reCaptcha->setPrivateKey($layout->recPrivateKey);
    } else {
      $this->reCaptcha->setPublicKey('6LfECAUAAAAAABFYnrzQvfUgwRzsxvziubNBoSw0');
      $this->reCaptcha->setPrivateKey('6LfECAUAAAAAACvo8uibMG4JnRcr5mXIA6YdDt_v');
    }
    // Dirty workaround to add language to api url, because due to a bug Google
    // does not take language from RecaptchaOptions above, see also:
    // https://groups.google.com/forum/?fromgroups#!topic/recaptcha/o-YdYJlnRVM
    $this->reCaptcha->setPublicKey($this->reCaptcha->getPublicKey() . '&amp;hl=' . $GLOBALS['TL_LANGUAGE']);
    
    $this->theme = (strlen($layout->recTheme) ? $layout->recTheme : 'red');
    
    //Custom theme file
    if ($layout->recTheme == 'custom')
    {
      if ($layout->recCustomTemplate != null)
      {
        $this->strTemplate = $layout->recCustomTemplate;
      } else {
        //Fallback to clean template
        $this->theme = 'clean';
      }
    }
  }

  /**
   * Add specific attributes
   * @param string
   * @param mixed
   */
  public function __set($strKey, $varValue)
  {
    switch ($strKey)
    {
			case 'required':
			case 'mandatory':
				// Is set by default
				break;

      default:
        parent::__set($strKey, $varValue);
        break;
    }
  }

  /**
   * Validate input
   */
  public function validate()
  {
    $response = $this->reCaptcha->check($this->Input->post("recaptcha_challenge_field"), $this->Input->post("recaptcha_response_field"));

    if (!$response->isValid())
    {
      $this->addError($GLOBALS['TL_LANG']['ERR']['captcha']);
      $this->reCaptcha->setError($response->getError());
    }

  }

  /**
   * Generate the label and return it as string
   * @return string
   */
  public function generateLabel()
  {
    if ($this->strLabel == '')
    {
      return '';
    }

    return sprintf('<label for="recaptcha_response_field" class="mandatory%s">%s%s%s</label>',
            (strlen($this->strClass) ? ' ' . $this->strClass : ''),
            '<span class="invisible">'.$GLOBALS['TL_LANG']['MSC']['mandatory'].'</span> ',
            $this->strLabel,
            '<span class="mandatory">*</span>');
  }

  /**
   * Generate the widget and return it as string
   * @return string
   */
  public function generate()
  {
    if (TL_MODE == 'BE')
    {
      $objTemplate = new \BackendTemplate('be_wildcard');
      $objTemplate->wildcard = '### reCaptcha ###';
      return $objTemplate->parse();
    }
    
    $config = sprintf("\n<script type=\"text/javascript\">\n var RecaptchaOptions = { theme : '%s', lang : '%s', tabindex : %u, custom_theme_widget: 'recaptcha_widget' };\n</script>\n",
              $this->theme,
              $GLOBALS['TL_LANGUAGE'],
              ($this->tabindex > 0 ? $this->tabindex : 0) );
    
    return $config . $this->reCaptcha->html() . $this->addSubmit();
  }

  /**
   * Return empty string, is needed for compatibility with original
   * captcha and to avoid errors
   * @return string
   */
  public function generateQuestion()
  {
    return '';
  }
  
	/**
	 * Get a page layout and return it as database result object
	 * @param \Model
	 * @return \Model
	 */
  protected function getPageLayout($objPage)
  {
		$blnMobile = ($objPage->mobileLayout && \Environment::get('agent')->mobile);

		// Override the autodetected value
		if (\Input::cookie('TL_VIEW') == 'mobile' && $objPage->mobileLayout)
		{
			$blnMobile = true;
		}
		elseif (\Input::cookie('TL_VIEW') == 'desktop')
		{
			$blnMobile = false;
		}

		$intId = $blnMobile ? $objPage->mobileLayout : $objPage->layout;
		$objLayout = \LayoutModel::findByPk($intId);

		return $objLayout;
  }

}

?>
