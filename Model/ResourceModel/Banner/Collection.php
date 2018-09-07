<?php
namespace Godogi\BannerSlider\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Godogi\BannerSlider\Model\Banner', 'Godogi\BannerSlider\Model\ResourceModel\Banner');
	}
}
