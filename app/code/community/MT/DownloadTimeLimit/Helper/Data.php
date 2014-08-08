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
?>
<?php
class MT_DownloadTimeLimit_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getCfgEnable()
    {
        return Mage::getStoreConfig('catalog/downloadable/enable_time_limit');
    }

    public function getCfgDateExpired()
    {
        return Mage::getStoreConfig('catalog/downloadable/downloads_time');
    }

    public function getCfgMaxIp()
    {
        return Mage::getStoreConfig('catalog/downloadable/limit_ip');
    }

    public function getLimitIp($linkHash,$userIp)
    {
        $collection = Mage::getModel('downloadtimelimit/downloadtimelimit')->getCollection()
                      ->addLinkHashFilter($linkHash);
        if($this->getCfgMaxIp() != 0){
            if(count($collection) >= $this->getCfgMaxIp()){
                $ips = array();
                foreach($collection as $item){
                    $ips[] = $item->getIp();
                }
                if(in_array($userIp,$ips)){
                    return true;
                }
                return false;
            }else{
                return true;
            }
        }
        return true;
    }

    public function checkIp($userIp)
    {
        $collection = Mage::getModel('downloadtimelimit/downloadtimelimit')->getCollection()
            ->addIpFilter($userIp);
        if(!count($collection)){
            return true;
        }
        return false;
    }
}