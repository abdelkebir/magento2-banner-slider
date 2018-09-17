<?php
namespace Godogi\BannerSlider\Model;
class Slider extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Godogi\BannerSlider\Model\ResourceModel\Slider');
	}
}
