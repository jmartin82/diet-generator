<?php

declare(strict_types=1);

namespace App\Diet\Tests\Helper;

use App\Diet\Domain\Model\BodyMeasurement;
use App\Diet\Domain\Model\DietPlan;
use App\Diet\Domain\Model\DietType;
use App\Diet\Domain\Model\Owner;
use App\Diet\Domain\Service\CalorieCalculator;

final class DietPlanFactory
{
    public function createDietPlanForTests(): DietPlan
    {
        $dietType = new DietType('Diet Type Name');
        $owner = new Owner(
            'test@email.pl',
            Owner::SEX_FEMALE,
            (new \DateTime())->modify('-20 years'),
            new BodyMeasurement(170, 69, CalorieCalculator::ACTIVITY_MEDIUM)
        );

        return new DietPlan($dietType, $owner);
    }
}
