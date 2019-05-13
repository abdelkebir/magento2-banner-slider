<?php
namespace Godogi\BannerSlider\Controller\Adminhtml\Banner;

use Godogi\BannerSlider\Controller\Adminhtml\Banner;

class Index extends Banner
{
		public function execute(){
				$resultPage = $this->_resultPageFactory->create();
				$resultPage->getConfig()->getTitle()->prepend((__('Banners')));
				return $resultPage;
		}
}
