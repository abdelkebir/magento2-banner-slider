<?php
namespace Godogi\BannerSlider\Controller\Adminhtml\Banner;
use Godogi\BannerSlider\Controller\Adminhtml\Banner;
class MassDelete extends Banner
{
  	/**
  	* @return void
  	*/
  	public function execute()
  	{
    		$collection = $this->_filter->getCollection($this->_collectionFactory->create());
    		$collectionSize = $collection->getSize();
    		foreach ($collection as $item) {
      			try {
          			 $item->delete();
      			} catch (\Exception $e) {
      				    $this->messageManager->addError($e->getMessage());
      			}
    		}
    		$this->messageManager->addSuccess(
    			__('A total of %1 banners(s) were deleted.', $collectionSize)
    		);
    		$this->_redirect('*/*/index');
  	}
}
