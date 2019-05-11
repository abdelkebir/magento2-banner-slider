<?php
namespace Godogi\BannerSlider\Block\Adminhtml\Banner;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
class Edit extends Container
{
	/**
	* Core registry
	*
	* @var \Magento\Framework\Registry
	*/
	protected $_coreRegistry = null;
	/**
	* @param Context $context
	* @param Registry $registry
	* @param array $data
	*/
	public function __construct(
  		Context $context,
  		Registry $registry,
  		array $data = []
	) {
  		$this->_coreRegistry = $registry;
  		parent::__construct($context, $data);
	}
	/**
	* Class constructor
	*
	* @return void
	*/
	protected function _construct()
	{
  		$this->_objectId = 'id';
  		$this->_controller = 'adminhtml_banner';
  		$this->_blockGroup = 'Godogi_Banner';
  		parent::_construct();
  		$this->buttonList->update('save', 'label', __('Save'));
  		$this->buttonList->add(
    			'saveandcontinue',
    			[
      				'label' => __('Save and Continue Edit'),
      				'class' => 'save',
      				'data_attribute' => [
        					'mage-init' => [
          						'button' => [
            							'event' => 'saveAndContinueEdit',
            							'target' => '#edit_form'
          						]
        					]
      				]
    			],
    		  -100
  		);
  		$this->buttonList->update('delete', 'label', __('Delete'));
	}
	/**
	* Retrieve text for header element depending on loaded news
	*
	* @return string
	*/
	public function getHeaderText()
	{
  		$bannerRegistry = $this->_coreRegistry->registry('godogi_bannerslider_banner');
  		if ($bannerRegistry->getId()) {
    			$bannerTitle = $this->escapeHtml($bannerRegistry->getTitle());
    			return __("Edit Banner '%1'", $bannerTitle);
  		} else {
  			   return __('Add Banner');
  		}
	}
}
