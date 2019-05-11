<?php
namespace Godogi\BannerSlider\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

use Godogi\BannerSlider\Model\BannerFactory;

class Banner extends Action
{
  /**
	* Result page factory
	*
	* @var PageFactory
	*/
	protected $_resultPageFactory;

  /**
	* Banner model factory
	*
	* @var BannerFactory
	*/
	protected $_bannerFactory;


	public function __construct(
		Context $context,
		PageFactory $resultPageFactory,
    BannerFactory $bannerFactory){
		parent::__construct($context);
		$this->_resultPageFactory = $resultPageFactory;
    $this->_bannerFactory = $bannerFactory;
	}

	public function execute()
	{
		return true;
	}
	/**
	* Pos access rights checking
	*
	* @return bool
	*/
	protected function _isAllowed()
	{
		return $this->_authorization->isAllowed('Godogi_BannerSlider::banners');
	}
}
