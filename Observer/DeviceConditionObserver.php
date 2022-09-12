<?php

declare(strict_types=1);

namespace Evino\DeviceSalesRuleCondition\Observer;

use Evino\DeviceSalesRuleCondition\Model\Rule\Condition\Device;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class DeviceConditionObserver implements ObserverInterface
{
    /**
     * Execute method
     *
     * @param Observer $observer
     * @return $this
     */
    public function execute(Observer $observer): self
    {
        $additional = $observer->getEvent()->getAdditional();
        $conditions = (array) $additional->getConditions();

        // Merging the old condition with our condition.
        $conditions = array_merge_recursive(
            $conditions,
            [
                [
                    'label' => __('Devices'),
                    'value' => Device::class
                ],
            ]
        );

        $additional->setConditions($conditions);
        return $this;
    }
}
