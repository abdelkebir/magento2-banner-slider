<?php
namespace Godogi\BannerSlider\Controller\Adminhtml\Banner;
use Godogi\BannerSlider\Controller\Adminhtml\Banner;
class Create extends Banner
{
  	public function execute()
  	{
  		  $this->_forward('edit');
  	}
}
