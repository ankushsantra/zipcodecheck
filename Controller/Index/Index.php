<?php
/**
 * Copyright
 *
 * @category Ankush
 * @package  Ankush_Ziptest
 */

namespace Ankush\Ziptest\Controller\Index;

/**
 * Zipcode Index Class
 */
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Ankush\Ziptest\Model\ZipcodeFactory;

class Index extends Action
{
    /**
     * @var ZipcodeFactory
     */
    protected $_zipcodeFactory;

    protected $resultFactory;

    protected $formKey;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        ZipcodeFactory $_zipcodeFactory
    ) {
        $this->resultFactory = $resultFactory;
        $this->_zipcodeFactory = $_zipcodeFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $zipcode = $this->getRequest()->getParam('zipcode');
            $rowCollection = $this->_zipcodeFactory
                ->create()
                ->getCollection()
                ->addFieldToFilter(
                    'zipcode_id', array(
                    'eq' => $zipcode
                    )
                );
            $getCollection['status'] = 0;
            foreach ($rowCollection as $item) {
                $getCollection['status'] = $item->getStatus();
                $getCollection['ship_info'] = $item->getShipInfo();
                $getCollection['cod'] = $item->getCod();
            }
            if ($getCollection['status'] == 1) {
                $response['ship_text'] = __($getCollection['ship_info']);
                $response['ship_type'] = 'success';
                if ($getCollection['cod'] == 1) {
                    $response['cod_text'] = __('COD is available.');
                    $response['cod_type'] = 'success';
                } else {
                    $response['cod_text'] = __('COD is not available.');
                    $response['cod_type'] = 'error';
                }
            } else {
                $response['ship_text'] = __(
                    'Delivery is not available in your area.'
                );
                $response['ship_type'] = 'error';
            }

            $resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
            $resultJson->setData($response);
            return $resultJson;
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }

    }

}
