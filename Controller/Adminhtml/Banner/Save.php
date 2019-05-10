<?php
namespace Godogi\BannerSlider\Controller\Adminhtml\Banner;
use Godogi\BannerSlider\Controller\Adminhtml\Banner;
class Save extends Banner
{
	/**
	* @return void
	*/
	public function execute()
	{
		$isBanner = $this->getRequest()->getBanner();
		if ($isBanner) {
  			$bannerModel = $this->_bannerFactory->create();
  			$bannerId = $this->getRequest()->getParam('banner_id');
  			if ($bannerId) {
  				    $bannerModel->load($bannerId);
  			}
  			$formData = $this->getRequest()->getParam('banner');
  			/*
  			echo '<pre>';
  			print_r($formData);
  			echo '<pre>';
  			exit();
  			return;
  			*/
  			$bannerModel->setData($formData);
  			try {
    				// Save banner
    				$bannerModel->save();
    				// Display success message
    				$this->messageManager->addSuccess(__('The banner has been saved.'));
    				// Check if 'Save and Continue'
    				if ($this->getRequest()->getParam('back')) {
      					$this->_redirect('*/*/edit', ['banner_id' => $bannerModel->getBannerId(), '_current' => true]);
      					return;
    				}
    				// Go to grid page
    				$this->_redirect('*/*/');
    				return;
    			} catch (\Exception $e) {
    				    $this->messageManager->addError($e->getMessage());
    			}
  			$this->_getSession()->setFormData($formData);
  			$this->_redirect('*/*/edit', ['banner_id' => $bannerId]);
		 }
	}
}
