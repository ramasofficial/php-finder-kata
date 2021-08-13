<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

class PersonBirthdateHandler
{
    public static function handle(array $persons): array
    {
        /** @var PersonResult[] $rows */
        $rows = [];
        $personsList = $persons;

        foreach ($persons as $key => $person) {
            unset($personsList[$key]);
            foreach ($personsList as $nextPerson) {
                $personResult = new PersonResult();

                if ($person->getBirthdate() < $nextPerson->getBirthdate()) {
                    $personResult->setFirstPerson($person)->setSecondPerson($nextPerson);
                } else {
                    $personResult->setFirstPerson($nextPerson)->setSecondPerson($person);
                }

                $personResult->setDifference(static::getTimeDifferenceBetweenTwoPersons($personResult));

                $rows[] = $personResult;
            }
        }

        return $rows;
    }

    private static function getTimeDifferenceBetweenTwoPersons(PersonResult $personResult): int
    {
        return $personResult->getSecondPerson()->getBirthdate()->getTimestamp() - $personResult->getFirstPerson()->getBirthdate()->getTimestamp();
    }
}
