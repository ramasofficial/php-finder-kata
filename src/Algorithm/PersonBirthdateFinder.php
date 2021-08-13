<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonBirthdateFinder
{
    /** @var Person[] */
    private $persons;

    public function __construct(array $persons)
    {
        $this->persons = $persons;
    }

    public function find(int $option): PersonResult
    {
        /** @var PersonResult[] $tr */
        $tr = [];

        for ($i = 0; $i < $this->countPersons(); $i++) {
            for ($j = $i + 1; $j < $this->countPersons(); $j++) {
                $personResult = new PersonResult();

                if ($this->persons[$i]->getBirthdate() < $this->persons[$j]->getBirthdate()) {
                    $personResult->setFirstPerson($this->persons[$i]);
                    $personResult->setSecondPerson($this->persons[$j]);
                } else {
                    $personResult->setFirstPerson($this->persons[$j]);
                    $personResult->setSecondPerson($this->persons[$i]);
                }

                $difference = $this->getTimeDifferenceBetweenTwoPersons($personResult);
                $personResult->setDifference($difference);

                $tr[] = $personResult;
            }
        }

        if ($this->isEmpty($tr)) {
            return new PersonResult();
        }

        $answer = PersonBirthdateDifferenceHandler::handle($tr, $option);

        return $answer;
    }

    private function isEmpty(array $array): bool
    {
        return empty($array);
    }

    private function countPersons()
    {
        return count($this->persons);
    }

    private function getTimeDifferenceBetweenTwoPersons(PersonResult $personResult)
    {
        return $personResult->getSecondPerson()->getBirthdate()->getTimestamp() - $personResult->getFirstPerson()->getBirthdate()->getTimestamp();
    }
}
