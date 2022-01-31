<?php
/**
* Numbers more readable for humans
*
* It intends to change numbers as 1000 as 1K or 1200000 as 1.2M
*
* This code is heavly base in this one: https://gist.github.com/RadGH/84edff0cc81e6326029c
*
* How to use \NumberFormat::readable(1000);
*/
namespace App\Http\Helpers;
class NumberFormat
{
    /** @var array ['suffix' => 'threshold'] */
    private const THRESHOLDS = [
        '' => 900,
        'K' => 900000,
        'M' => 900000000,
        'B' => 900000000000,
        'T' => 90000000000000,
    ];

    /** @var string */
    private const DEFAULT = '900T+';

    /**
     * @param float $value
     * @param int $precision
     * @return string
     */
    static function readable(float $value, int $precision = 1): string
    {
        foreach (self::THRESHOLDS as $suffix => $threshold) {
            if ($value < $threshold) {
                return self::format($value, $precision, $threshold, $suffix);
            }
        }

        return self::DEFAULT;
    }

    /**
     * @param float $value
     * @param int $precision
     * @param int $threshold
     * @param string $suffix
     * @return string
     */
    static private function format(float $value, int $precision, int $threshold, string $suffix): string
    {
        $formattedNumber = number_format($value / ($threshold / self::THRESHOLDS['']), $precision);
        $cleanedNumber = (strpos($formattedNumber, '.') === false)
            ? $formattedNumber
            : rtrim(rtrim($formattedNumber, '0'), '.');

        return $cleanedNumber . $suffix;
    }
}