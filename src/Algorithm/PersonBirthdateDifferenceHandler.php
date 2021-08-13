<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

class PersonBirthdateDifferenceHandler
{
    public static function handle($tr, $option)
    {
        $firstRow = $tr[0];

        foreach ($tr as $currentRow) {
            $difference = static::doesFirstRowHigherThanSecond($currentRow->getDifference(), $firstRow->getDifference());

            switch ($option) {
                case PersonBirthdateFinderConfig::CLOSEST:
                    if (!$difference) {
                        $firstRow = $currentRow;
                    }
                    break;
                case PersonBirthdateFinderConfig::FURTHEST:
                    if ($difference) {
                        $firstRow = $currentRow;
                    }
                    break;
            }
        }

        return $firstRow;
    }

    private static function doesFirstRowHigherThanSecond(int $first, int $second): bool
    {
        return $first > $second;
    }
}
