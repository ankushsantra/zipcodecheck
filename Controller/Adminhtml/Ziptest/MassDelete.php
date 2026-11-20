<?php
/**
 * Copyright
 *
 * @category Ankush
 * @package  Ankush_Ziptest
 */

namespace Ankush\Ziptest\Controller\Adminhtml\ziptest;

/**
 * Zipcode MassDelete Class
 */
use Ankush\Ziptest\Model\ZipcodeFactory;

class MassDelete extends \Magento\Backend\App\Action
{
    /**
     * @var ZipcodeFactory
     */
    protected $_zipcodeFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        ZipcodeFactory $_zipcodeFactory
    ) {
        $this->_zipcodeFactory = $_zipcodeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $collectionData = $this->_zipcodeFactory->create()->getCollection();
        foreach ($collectionData as $value) {
            $allZipIds[] = $value['id'];
        }

        if (array_key_exists("selected", $data)) {
            $selectedIds = $data['selected'];
        }
        if (array_key_exists("excluded", $data)) {
            if ($data['excluded'] == 'false') {
                $selectedIds = $allZipIds;
            } else {
                $selectedIds = array_diff($allZipIds, $data['excluded']);
            }
        }
        try {
            foreach ($selectedIds as $selectedId) {
                $deleteData = $this->_zipcodeFactory->create()->load($selectedId);
                $deleteData->delete();
            }
            $this->messageManager->addSuccess(
                __(
                    'Row data has been successfully deleted.'
                )
            );
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
