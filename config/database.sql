-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- 
-- Table `tl_layout`
-- 

CREATE TABLE `tl_layout` (
  `recPublicKey` varchar(48) NOT NULL default '',
  `recPrivateKey` varchar(48) NOT NULL default '',
  `recTheme` varchar(32) NOT NULL default '',
  `recCustomTemplate` varchar(128) NOT NULL default '',
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
