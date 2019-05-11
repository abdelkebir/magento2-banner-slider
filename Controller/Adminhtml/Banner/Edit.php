<?php
namespace Godogi\BannerSlider\Controller\Adminhtml\Banner;

use Godogi\BannerSlider\Controller\Adminhtml\Banner;

class Edit extends Banner
{
	/**
	* @return void
	*/
	public function execute()
	{
		$bannerId = $this->getRequest()->getParam('banner_id');
		/** @var \Godogi\BannerSlider\Model\Banner $model */
		$model = $this->_bannerFactory->create();

		if ($bannerId) {
  			$model->load($bannerId);
  			if (!$model->getId()) {
    				$this->messageManager->addError(__('This banner no longer exists.'));
    				$this->_redirect('*/*/');
    				return;
  			}
		}
		// Restore previously entered form data from session
		$data = $this->_session->getBannerData(true);
		if (!empty($data)) {
			$model->setData($data);
		}
		$this->_coreRegistry->register('godogi_bannerslider_banner', $model);
		/** @var \Magento\Backend\Model\View\Result\Page $resultPage */
		$resultPage = $this->_resultPageFactory->create();
		$resultPage->setActiveMenu('Godogi_BannerSlider::banner');
		$resultPage->getConfig()->getTitle()->prepend(__('Banner'));
		return $resultPage;
	}
}
