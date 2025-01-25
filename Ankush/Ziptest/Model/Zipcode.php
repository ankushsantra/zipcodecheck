<?php

namespace Ankush\Ziptest\Model;

class Zipcode extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     *
     */
    const CACHE_TAG = 'ankush_ziptest';
    /**
     * @var string
     */
    protected $_cacheTag = 'ankush_ziptest';
    /**
     * @var string
     */
    protected $_eventPrefix = 'ankush_ziptest';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Ankush\Ziptest\Model\ResourceModel\Zipcode');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
