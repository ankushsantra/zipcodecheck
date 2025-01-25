<?php

namespace Ankush\Ziptest\Model\ResourceModel;

class Zipcode extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('ankush_ziptest', 'id');
    }
}
