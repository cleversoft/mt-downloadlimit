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
Class MT_DownloadTimeLimit_Block_Adminhtml_Downloadable_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        $this->_objectId = 'purchased_id';
        $this->_blockGroup = 'downloadtimelimit';
        $this->_controller = 'adminhtml_downloadable';
        $this->_form        = 'edit';
        parent::__construct();
        $this->_removeButton('save');
        $this->_removeButton('reset');
    }

    public function getHeaderText(){
        $model = Mage::registry('downloadtimelimit_downloadable');
        if ($model->getId()) {
            return Mage::helper('downloadtimelimit')->__("Edit downloadable '%s'", $this->escapeHtml($model->getOrderIncrementId()));
        } else {
            return Mage::helper('downloadtimelimit')->__('New downloadable');
        }
    }
}