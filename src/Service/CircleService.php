<?php declare(strict_types=1);

namespace App\Service;

class CircleService
{
    /**
     * @param float $circleDiameter
     * @return string
     *
     * return result message with circle diameter value
     */
    public static function resultMessage(int $circleDiameter): string
    {
        return "The diameter of a circle is $circleDiameter cm.";
    }

    /**
     * @param int $radius
     * @return int
     *
     * Calculate circle diameter using radius
     *
     * Formula:
     * d = 2r
     */
    public function circleDiameterCalculator(int $radius): int
    {
        return 2 * $radius;
    }
}