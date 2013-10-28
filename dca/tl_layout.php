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
 * @license    LGPL 
 * @filesource
 */
 
/**
 * Table tl_layout
 */
$GLOBALS['TL_DCA']['tl_layout']['palettes']['default']  = str_replace('head;', 'head;{recaptcha_legend:hide},recPublicKey,recPrivateKey,recTheme,recCustomTemplate;', $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_layout']['fields']['recPublicKey'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['recPublicKey'],
      'exclude'                 => true,
      'filter'                  => true,
      'search'                  => false,
      'inputType'               => 'text',
      'eval'                    => array('decodeEntities'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['recPrivateKey'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['recPrivateKey'],
      'exclude'                 => true,
      'filter'                  => true,
      'search'                  => false,
      'inputType'               => 'text',
      'eval'                    => array('decodeEntities'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['recTheme'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['recTheme'],
      'exclude'                 => true,
      'filter'                  => true,
      'search'                  => false,
      'inputType'               => 'select',
      'options'                 => array('red', 'white', 'blackglass', 'clean', 'custom'),
      'eval'                    => array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_layout']['fields']['recCustomTemplate'] = array
(
      'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['recCustomTemplate'],
      'exclude'                 => true,
      'filter'                  => true,
      'search'                  => false,
      'inputType'               => 'select',
      'options'                 => $this->getTemplateGroup("rec_"),
      'eval'                    => array('tl_class'=>'w50')
);

