<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     MT
 * @package      MT_DownloadTimeLimit
 * ------------------------------------------------------------------------------
 * @copyright    Copyright (C) 2008-2013 MagentoThemes.net. All Rights Reserved.
 * @license      GNU General Public License version 2 or later;
 * @author       MagentoThemes.net
 * @email        support@magentothemes.net
 * ------------------------------------------------------------------------------
 *
 */

class MT_DownloadTimeLimit_Block_Adminhtml_Downloadable_Edit_Tab_Downloaded extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct(){
        parent::__construct();
        $this->setId('downloaded_grid');
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
        $this->setUseAjax(true);
    }

    protected function _prepareCollection(){
        $id = $this->getRequest()->getParam('id');
        $collection = Mage::getModel('downloadtimelimit/downloadtimelimit')
            ->getCollection()
            ->addPurchasedIdFilter($id);
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns(){
        $this->addColumn('id', array(
            'header'    => Mage::helper('downloadtimelimit')->__('ID'),
            'index'     => 'id',
            'width'     => '10px'
        ));

        $this->addColumn('time', array(
            'header' => Mage::helper('downloadtimelimit')->__('Date'),
            'index' => 'time',
            'type' => 'date',
            'format' => Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'align' => 'left',
            'width' => '150px',
        ));

        $this->addColumn('link_hash', array(
            'index' => 'link_hash',
            'header' => Mage::helper('downloadtimelimit')->__('Link Hash'),
            'width' => '250px',
        ));

        $this->addColumn('ip', array(
            'header'    => Mage::helper('downloadtimelimit')->__('Ip'),
            'index'     => 'ip',
            'width'     => '100px'
        ));

        $this->addColumn('user_id', array(
            'header'    => Mage::helper('downloadtimelimit')->__('User Id'),
            'index'     => 'user_id',
            'width'     => '100px'
        ));
    }

    public function getGridUrl(){
        return $this->getUrl('*/*/downloadedGrid', array('_current' => true));
    }

    public function getRowUrl($item){
        return null;
    }
}
