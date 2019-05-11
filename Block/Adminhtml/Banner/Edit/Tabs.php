<?php
namespace Godogi\BannerSlider\Block\Adminhtml\Banner\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

class Tabs extends WidgetTabs
{
	/**
	* Class constructor
	*
	* @return void
	*/
	protected function _construct()
	{
		parent::_construct();
		$this->setId('banner_edit_tabs');
		$this->setDestElementId('edit_form');
		$this->setTitle(__('Banner Information'));
	}
	/**
	* @return $this
	*/
	protected function _beforeToHtml()
	{
		$this->addTab(
			'banner_info',
			[
				'label' => __('General'),
				'title' => __('General'),
				'content' => $this->getLayout()->createBlock('Godogi\BannerSlider\Block\Adminhtml\Banner\Edit\Tab\Info')->toHtml(),
				'active' => true
			]
		);
		return parent::_beforeToHtml();
	}
}
