<?php

namespace Ankush\Ziptest\Block\Adminhtml\Zipcode\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    /**
     * @var
     */
    protected $_systemStore;

    /**
     * Form constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return Form
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(['data' => ['id' => 'edit_form', 'enctype' => 'multipart/form-data', 'action' => $this->getData('action'), 'method' => 'post']]);
        $form->setHtmlIdPrefix('ankush_ziptest_');
        if ($model) {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Zipcode Details'), 'class' => 'fieldset-wide']);
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Zipcode Details'), 'class' => 'fieldset-wide']);
        }

        $fieldset->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );

        $fieldset->addField(
            'zipcode_id',
            'text',
            [
                'name' => 'zipcode_id',
                'label' => __('Zipcode'),
                'title' => __('Zipcode'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'ship_info',
            'text',
            [
                'name' => 'ship_info',
                'label' => __('Delivery Info'),
                'title' => __('Delivery Info'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'cod',
            'select',
            [
                'label' => __('Cash On Delivery'),
                'title' => __('Cash On Delivery'),
                'name' => 'cod',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );

        $form->setValues($model ? $model->getData() : '');
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
