<?php
/**
 * Copyright
 *
 * @category Ankush
 * @package  Ankush_Ziptest
 */

namespace Ankush\Ziptest\Ui\DataProvider\Zipcode;

/**
 * Zipcode Collection Class
 */
use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('id', 'main_table.id');
        $this->addFilterToMap('zipcode', 'ankushziptestzipcode.value');
        parent::_initSelect();
    }
}
