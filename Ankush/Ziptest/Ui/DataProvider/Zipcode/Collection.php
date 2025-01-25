<?php

namespace Ankush\Ziptest\Ui\DataProvider\Zipcode;

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
