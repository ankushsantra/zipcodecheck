<?php

namespace Ankush\Ziptest\Model\ResourceModel\Zipcode;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'ankush_ziptest_zipcode_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'zipcode_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Ankush\Ziptest\Model\Zipcode', 'Ankush\Ziptest\Model\ResourceModel\Zipcode');

    }
}
