<?php
namespace Godogi\BannerSlider\Model;
class Banner extends \Magento\Framework\Model\AbstractModel
{
	protected function _construct()
	{
		$this->_init('Godogi\BannerSlider\Model\ResourceModel\Banner');
	}
}
