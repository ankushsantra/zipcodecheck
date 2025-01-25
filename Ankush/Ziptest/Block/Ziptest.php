<?php
namespace Ankush\Ziptest\Block;
class Ziptest extends \Magento\Framework\View\Element\Template
{
	public function __construct(\Magento\Framework\View\Element\Template\Context $context)
	{
		parent::__construct($context);
	}

	public function getFormActionUrl()
    {
        return $this->getUrl('zipcodetest/index/index', ['_secure' => true]);
    }

	public function getBlockTitle()
    {
		return __('Check for delivery availability in your area:');
    }
}
