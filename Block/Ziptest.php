<?php
/**
 * Copyright
 *
 * @category Ankush
 * @package  Ankush_Ziptest
 */

namespace Ankush\Ziptest\Block;

/**
 * Zipcode Ziptest Class
 */
class Ziptest extends \Magento\Framework\View\Element\Template
{
    /**
     * Constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Get form action URL
     *
     * @return string
     */
    public function getFormActionUrl()
    {
        return $this->getUrl('zipcodetest/index/index', ['_secure' => true]);
    }

    /**
     * Get block title
     *
     * @return string
     */
    public function getBlockTitle()
    {
        return __('Check for delivery availability in your area:');
    }
}
