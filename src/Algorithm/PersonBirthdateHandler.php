<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

class PersonBirthdateHandler
{
    public static function handle(array $persons): array
    {
        /** @var PersonResult[] $rows */
        $rows = [];

        for ($i = 0; $i < static::countPersons($persons); $i++) {
            for ($j = $i + 1; $j < static::countPersons($persons); $j++) {
                $personResult = new PersonResult();

                if ($persons[$i]->getBirthdate() < $persons[$j]->getBirthdate()) {
                    $personResult->setFirstPerson($persons[$i]);
                    $personResult->setSecondPerson($persons[$j]);
                } else {
                    $personResult->setFirstPerson($persons[$j]);
                    $personResult->setSecondPerson($persons[$i]);
                }

                $difference = static::getTimeDifferenceBetweenTwoPersons($personResult);
                $personResult->setDifference($difference);

                $rows[] = $personResult;
            }
        }

        return $rows;
    }

    private static function countPersons(array $persons): int
    {
        return count($persons);
    }

    private static function getTimeDifferenceBetweenTwoPersons(PersonResult $personResult): int
    {
        return $personResult->getSecondPerson()->getBirthdate()->getTimestamp() - $personResult->getFirstPerson()->getBirthdate()->getTimestamp();
    }
}
