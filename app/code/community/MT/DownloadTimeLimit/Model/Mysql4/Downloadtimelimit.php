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
Class MT_DownloadTimeLimit_Model_Mysql4_DownloadTimeLimit extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('downloadtimelimit/downloadtimelimit', 'id');
    }
}