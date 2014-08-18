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
class MT_DownloadTimeLimit_Block_Adminhtml_Downloadable_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct(){
        parent::__construct();
        $this->setDestElementId('edit_form');
        $this->setId('downloaded');
        if ($tab = $this->getRequest()->getParam('activeTab')){
            $this->_activeTab = $tab;
        }else{
            $this->_activeTab = 'info_section';
        }
        $this->setTitle(Mage::helper('downloadtimelimit')->__('Manager Downloadable'));
    }

    public function _prepareLayout()
    {
        $this->addTabAfter('downloadinfo_section', array(
            'label' => Mage::helper('downloadtimelimit')->__('IP Downloads'),
            'title' => Mage::helper('downloadtimelimit')->__('IP Downloads'),
            'url'   => $this->getUrl('*/*/downloaded', array('_current' => true)),
            'class' => 'ajax'
        ), 'info_section');

        return parent::_prepareLayout();
    }
}