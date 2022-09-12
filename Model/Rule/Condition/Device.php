<?php

declare(strict_types=1);

namespace Evino\DeviceSalesRuleCondition\Model\Rule\Condition;

use Magento\Framework\Model\AbstractModel;
use Magento\Rule\Model\Condition\AbstractCondition;

class Device extends AbstractCondition
{

    /**
     * Load attribute options
     *
     * @return $this
     */
    public function loadAttributeOptions(): self
    {
        $this->setAttributeOption(['device' => __('Device')]);

        return $this;
    }

    /**
     * Get input type
     */
    public function getInputType(): string
    {
        return 'select';
    }

    /**
     * Get value element type
     */
    public function getValueElementType(): string
    {
        return 'multiselect';
    }

    /**
     * Get value select options
     */
    public function getValueSelectOptions(): array
    {
        if (!$this->hasData('value_select_options')) {
            $this->setData(
                'value_select_options',
                [
                    [
                        'label' => __('Desktop'),
                        'value' => 'device_desktop'
                    ],
                    [
                        'label' => __('Android'),
                        'value' => 'device_android'
                    ],
                    [
                        'label' => __('IOS'),
                        'value' => 'device_ios'
                    ]
                ]
            );
        }
        return $this->getData('value_select_options');
    }

    /**
     * Validate Rule Condition
     *
     * @param AbstractModel $model
     * @return bool
     */
    public function validate(AbstractModel $model): bool
    {
        //put your own business logic

        return parent::validate($model);
    }
}
