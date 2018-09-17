<?php
namespace Godogi\BannerSlider\Model\ResourceModel\Slider;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Godogi\BannerSlider\Model\Slider', 'Godogi\BannerSlider\Model\ResourceModel\Slider');
	}
}
