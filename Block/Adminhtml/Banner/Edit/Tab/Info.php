<?php
namespace Godogi\Banner\Block\Adminhtml\Banner\Edit\Tab;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Magento\Directory\Model\Config\Source\Country;
class Info extends Generic implements TabInterface
{
  protected $_countryFactory;
	/**
	* @param Context $context
	* @param Registry $registry
	* @param FormFactory $formFactory
	* @param array $data
	*/
	public function __construct(
		Context $context,
		Registry $registry,
		FormFactory $formFactory,
    Country $countryFactory,
		array $data = []
	) {
    $this->_countryFactory = $countryFactory;
		parent::__construct($context, $registry, $formFactory, $data);
	}
	/**
	* Prepare form fields
	*
	* @return \Magento\Backend\Block\Widget\Form
	*/
	protected function _prepareForm()
	{
		/** @var $model \Godogi\BannerSlider\Model\Banner */
		$model = $this->_coreRegistry->registry('godogi_bannerslider_banner');
		/** @var \Magento\Framework\Data\Form $form */
		$form = $this->_formFactory->create();
		$form->setHtmlIdPrefix('banner_');
		$form->setFieldNameSuffix('banner');
		$fieldset = $form->addFieldset(
			'base_fieldset',
			['legend' => __('General')]
		);
		if ($model->getId()) {
			$fieldset->addField(
				'banner_id',
				'hidden',
				['name' => 'banner_id']
			);
		}
    $fieldset->addField(
        'img',
        'image',
        array(
            'name' => 'img',
            'label' => __('Image'),
            'title' => __('Image'),
            'note' => 'Allow image type: jpg, jpeg, png',
       )
    );
    $fieldset->addField(
			'url',
			'text',
			[
				'name' => 'url',
				'label' => __('Url'),
				'required' => true
			]
		);
    $fieldset->addField(
        'status',
        'select',
        [
            'name' => 'status',
            'label' => __('Status'),
            'title' => __('Status'),
            'values' => [ 1 => 'Enabled', 0 => 'Disabled'],
            'required' => true
        ]
    );

		$data = $model->getData();
		$form->setValues($data);
		$this->setForm($form);
		return parent::_prepareForm();
	}
	/**
	* Prepare label for tab
	*
	* @return string
	*/
	public function getTabLabel()
	{
		return __('Banner Info');
	}
	/**
	* Prepare title for tab
	*
	* @return string
	*/
	public function getTabTitle()
	{
		return __('Banner Info');
	}
	/**
	* {@inheritdoc}
	*/
	public function canShowTab()
	{
		return true;
	}
	/**
	* {@inheritdoc}
	*/
	public function isHidden()
	{
		return false;
	}
}
