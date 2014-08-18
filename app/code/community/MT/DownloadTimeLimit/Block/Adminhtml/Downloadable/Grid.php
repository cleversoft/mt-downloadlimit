<?php
/**
 *
 * ------------------------------------------------------------------------------
 * @category     MT
 * @package      MT_ProductQuestions
 * ------------------------------------------------------------------------------
 * @copyright    Copyright (C) 2008-2013 MagentoThemes.net. All Rights Reserved.
 * @license      GNU General Public License version 2 or later;
 * @author       MagentoThemes.net
 * @email        support@magentothemes.net
 * ------------------------------------------------------------------------------
 *
 */
Class MT_DownloadTimeLimit_Block_Adminhtml_Downloadable_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $session = Mage::getSingleton('adminhtml/session');
        $this->setId('downloadableGrid');
        $this->setDefaultSort('purchased_id');
        $this->setDefaultSort('created_at')
             ->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection(){
        $collection = Mage::getResourceModel('downloadable/link_purchased_collection');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {

        $this->addColumn('order_increment_id', array(
            'index' => 'order_increment_id',
            'header' => $this->__('Order #'),
            'width' => '10px',
        ));

        $this->addColumn('created_at', array(
            'header' => $this->__('Date'),
            'index' => 'created_at',
            'type' => 'date',
            'format' => Mage::app()->getLocale()->getDateTimeFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
            'align' => 'left',
            'width' => '150px',
        ));

        $this->addColumn('product_name', array(
            'index' => 'product_name',
            'header' => $this->__('Title'),
            'width' => '250px',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/adminhtml_downloadable/edit', array(
            'id' => $row->getPurchasedId()
        ));
    }

}