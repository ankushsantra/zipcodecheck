<?php

namespace Ankush\Ziptest\Controller\Adminhtml\ziptest;

use Ankush\Ziptest\Model\ZipcodeFactory;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * @var ZipcodeFactory
     */
    protected $_zipcodeFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ZipcodeFactory $_zipcodeFactory
    )
    {
        $this->_zipcodeFactory = $_zipcodeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $rowId = (int)$this->getRequest()->getParam('id');
        try {
            $deleteData = $this->_zipcodeFactory->create()->load($rowId);
            $deleteData->delete();
            $this->messageManager->addSuccess(__('Data has been successfully deleted.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('ankush/ziptest/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Ankush_Ziptest::zipcodes');
    }
}
