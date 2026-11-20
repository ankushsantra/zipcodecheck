<?php
/**
 * Copyright
 *
 * @category Ankush
 * @package  Ankush_Ziptest
 */

namespace Ankush\Ziptest\Model;

/**
 * Zipcode ZipcodeFactory Class
 */
class ZipcodeFactory
{
    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    /**
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManager
    ) {
        $this->_objectManager = $objectManager;
    }

    /**
     * Create new country model
     *
     * @param  array $arguments
     * @return \Magento\Directory\Model\Country
     */
    public function create(array $arguments = [])
    {
        return $this->_objectManager->create(
            'Ankush\Ziptest\Model\Zipcode',
            $arguments,
            false
        );
    }
}
