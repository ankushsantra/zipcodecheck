<?php

namespace Ankush\Ziptest\Controller\Adminhtml\ziptest;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Ankush\Ziptest\Model\ZipcodeFactory
     */
    protected $_zipcodeFactory;

    /**
     * Save constructor.
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Ankush\Ziptest\Model\ZipcodeFactory $_zipcodeFactory
    )
    {
        $this->_zipcodeFactory = $_zipcodeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $zipcodeId = isset($data['id']) ? $data['id'] : '';
        if (!$data) {
            $this->_redirect('ankush/ziptest/index');
        }
        try {
            $rowData = $this->_zipcodeFactory->create()->load($zipcodeId);
            if (!$rowData->getId() && $zipcodeId) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('ankush/ziptest/index');
            }
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
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
        return $this->_authorization->isAllowed('MageDigest_CustomerReview::home');
    }
}
