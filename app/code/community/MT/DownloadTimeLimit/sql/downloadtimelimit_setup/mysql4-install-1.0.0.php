<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     MT
 * @package      MT_DownloadTimeLimit
 * ------------------------------------------------------------------------------
 * @copyright    Copyright (C) 2008-2014 MagentoThemes.net. All Rights Reserved.
 * @license      GNU General Public License version 2 or later;
 * @author       MagentoThemes.net
 * @email        support@magentothemes.net
 * ------------------------------------------------------------------------------
 *
 */
$installer = $this;
$installer->startSetup();
$installer->run("
CREATE TABLE {$this->getTable('downloadtimelimit/downloadtimelimit')} (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `link_hash` varchar(255) DEFAULT NULL,
		  `ip` varchar(50) DEFAULT NULL,
		  PRIMARY KEY (`id`)
		) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
");
$installer->endSetup();