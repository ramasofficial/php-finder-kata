<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

class PersonBirthdateHandler
{
    public static function handle(array $persons): array
    {
        /** @var PersonResult[] $rows */
        $rows = [];

        foreach ($persons as $key => $person) {
            for ($nextPerson = ++$key; $nextPerson < static::countPersons($persons); $nextPerson++) {
                $personResult = new PersonResult();

                if ($person->getBirthdate() < $persons[$nextPerson]->getBirthdate()) {
                    $personResult->setFirstPerson($person);
                    $personResult->setSecondPerson($persons[$nextPerson]);
                } else {
                    $personResult->setFirstPerson($persons[$nextPerson]);
                    $personResult->setSecondPerson($person);
                }

                $personResult->setDifference(static::getTimeDifferenceBetweenTwoPersons($personResult));

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
