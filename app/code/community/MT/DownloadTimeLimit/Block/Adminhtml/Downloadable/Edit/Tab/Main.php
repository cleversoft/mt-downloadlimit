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
class MT_DownloadTimeLimit_Block_Adminhtml_Downloadable_Edit_Tab_Main
    extends Mage_Adminhtml_Block_Widget_Form
    implements Mage_Adminhtml_Block_Widget_Tab_Interface{

    public function getTabLabel(){
        return Mage::helper('downloadtimelimit')->__('Information');
    }

    public function getTabTitle(){
        return Mage::helper('downloadtimelimit')->__('General Information');
    }

    public function canShowTab(){
        return true;
    }

    public function isHidden(){
        return false;
    }

    public function getDownloadableInfo() {
        return Mage::registry('downloadtimelimit_downloadable');
    }

    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();

        $form->setHtmlIdPrefix('downloadable_');
        $form->setFieldNameSuffix('downloadable');

        $this->setForm($form);

        $fieldset = $form->addFieldset('downloadable_general', array('legend'=> $this->__('General Information')));

        $this->_addElementTypes($fieldset);

        $fieldset->addField('product_name', 'text', array(
            'name' 		=> 'product_name',
            'label' 	=> $this->__('Product Name'),
            'title' 	=> $this->__('Product Name'),
            'required'	=> true,
            'class'		=> 'required-entry',
        ));

        if ($model = Mage::registry('downloadtimelimit_downloadable')) {
            $form->setValues($model->getData());
        }

        return parent::_prepareForm();
    }
}
