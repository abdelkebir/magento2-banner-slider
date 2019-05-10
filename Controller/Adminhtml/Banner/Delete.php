<?php
namespace Godogi\BannerSlider\Controller\Adminhtml\Banner;
use Godogi\BannerSlider\Controller\Adminhtml\Banner;
class Delete extends Banner
{
	/**
	* @return void
	*/
	public function execute()
	{
  		$bannerId = (int) $this->getRequest()->getParam('banner_id');
  		if ($bannerId) {
    			/** @var $bannerModel \Godogi\BannerSlider\Model\Banner */
    			$bannerModel = $this->_bannerFactory->create();
    			$bannerModel->load($bannerId);
    			// Check this banner exists or not
    			if (!$bannerModel->getPosId()) {
    		      $this->messageManager->addError(__('This banner no longer exists.'));
    			} else {
      				try {
        					// Delete banner
        					$bannerModel->delete();
        					$this->messageManager->addSuccess(__('The banner has been deleted.'));
        					// Redirect to grid page
        					$this->_redirect('*/*/');
        					return;
      				} catch (\Exception $e) {
        					$this->messageManager->addError($e->getMessage());
        					$this->_redirect('*/*/edit', ['banner_id' => $bannerModel->getBannerId()]);
      				}
    			}
  		}
	}
}
