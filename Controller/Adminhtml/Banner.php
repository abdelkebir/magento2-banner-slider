<?php
namespace Godogi\BannerSlider\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Filesystem;

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

	/**
	* Core registry
	*
	* @var Registry
	*/
	protected $_coreRegistry;

	protected $_fileUploaderFactory;

  protected $_mediaDirectory;


	public function __construct(
			Context $context,
			PageFactory $resultPageFactory,
	    BannerFactory $bannerFactory,
			Registry $coreRegistry,
			Filesystem $filesystem,
	    UploaderFactory $fileUploaderFactory){
					parent::__construct($context);
					$this->_resultPageFactory = $resultPageFactory;
			    $this->_bannerFactory = $bannerFactory;
					$this->_coreRegistry = $coreRegistry;
					$this->_mediaDirectory = $filesystem->getDirectoryWrite(DirectoryList::MEDIA);
		      $this->_fileUploaderFactory = $fileUploaderFactory;
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
