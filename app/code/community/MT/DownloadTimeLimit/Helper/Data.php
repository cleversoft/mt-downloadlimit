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

    public function checkIp($userIp,$linkHash)
    {
        $collection = Mage::getModel('downloadtimelimit/downloadtimelimit')->getCollection()
            ->addIpFilter($userIp)
            ->addLinkHashFilter($linkHash);
        if(!count($collection)){
            return true;
        }
        return false;
    }

    public function getOrderInfo($incrementId)
    {
        return Mage::getModel('sales/order')->loadByIncrementId($incrementId);
    }

    public function getClientIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        elseif(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        elseif(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}