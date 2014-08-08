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
class MT_DownloadTimeLimit_Model_Mysql4_DownloadTimeLimit_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{

    public function _construct()
    {
        $this->_init('downloadtimelimit/downloadtimelimit');
    }

    public function addLinkHashFilter($linkhash)
    {
        $this->getSelect()
            ->where('main_table.link_hash = ?', $linkhash);
        return $this;
    }

    public function addIpFilter($userIp)
    {
        $this->getSelect()
            ->where('main_table.ip = ?', $userIp);
        return $this;
    }

}