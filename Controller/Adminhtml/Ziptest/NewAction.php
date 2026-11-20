<?php
/**
 * Copyright
 *
 * @category Ankush
 * @package  Ankush_Ziptest
 */

namespace Ankush\Ziptest\Controller\Adminhtml\ziptest;

/**
 * Zipcode NewAction Class
 */
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Ankush\Ziptest\Model\ZipcodeFactory;

class NewAction extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var ZipcodeFactory
     */
    protected $_zipcodeFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * NewAction constructor.
     *
     * @param Context                     $context
     * @param PageFactory                 $rawFactory
     * @param ZipcodeFactory              $_zipcodeFactory
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory,
        ZipcodeFactory $_zipcodeFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        $this->pageFactory = $rawFactory;
        $this->_zipcodeFactory = $_zipcodeFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }


    /**
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Magento_Backend::stores');
        $title = __('Add Zipcode');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ankush_Ziptest::zipcodes');
    }
}
