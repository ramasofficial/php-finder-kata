<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonResult
{
    private $firstPerson;

    private $secondPerson;

    private $difference;

    public function setFirstPerson(Person $firstPerson)
    {
        $this->firstPerson = $firstPerson;
    }

    public function getFirstPerson()
    {
        return $this->firstPerson;
    }

    public function setSecondPerson(Person $secondPerson)
    {
        $this->secondPerson = $secondPerson;
    }

    public function getSecondPerson()
    {
        return $this->secondPerson;
    }

    public function setDifference(int $difference)
    {
        $this->difference = $difference;
    }

    public function getDifference()
    {
        return $this->difference;
    }
}
