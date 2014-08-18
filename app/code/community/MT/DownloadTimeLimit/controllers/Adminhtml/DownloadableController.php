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
class MT_DownloadTimeLimit_Adminhtml_DownloadableController extends Mage_Adminhtml_Controller_Action
{

    /**
     * Init actions
     *
     * @return Mage_Adminhtml_Cms_PageController
     */
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $this->loadLayout()
            ->_setActiveMenu('mt/downloadtimelimit')
            ->_title(Mage::helper('downloadtimelimit')->__('Manage Downloadable'))
            ->_addBreadcrumb(Mage::helper('downloadtimelimit')->__('Manage Downloadable'), Mage::helper('downloadtimelimit')->__('Manage Downloadable'));
        return $this;
    }

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->_initAction();
        $this->_addContent($this->getLayout()->createBlock('downloadtimelimit/adminhtml_downloadable'));
        $this->renderLayout();
    }

    /**
     * Display the edit/add form
     *
     */
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('downloadable/link_purchased');
        $this->loadLayout();
        if ($id) {
            $model->load($id);
            if (! $model->getId()) {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('downloadtimelimit')->__('This downloadable no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }
        // 3. Set entered data if was error when we do save
        $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
        if (! empty($data)) {
            $model->setData($data);
        }

        Mage::register('downloadtimelimit_downloadable', $model);

        // 5. Build edit form
        $this->_initAction()
            ->_addBreadcrumb($id ? Mage::helper('downloadtimelimit')->__('Edit Downloadable') : '', $id ? Mage::helper('downloadtimelimit')->__('Edit Downloadable') : '');
        $this->_setActiveMenu('mt/downloadtimelimit');
        $this->renderLayout();
    }

    public function downloadedAction(){
        $this->loadLayout()->renderLayout();
    }

    public function downloadedGridAction(){
        $this->loadLayout()->renderLayout();
    }

}