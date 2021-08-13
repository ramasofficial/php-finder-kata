<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonResult
{
    private $firstPerson;

    private $secondPerson;

    private int $difference;

    public function setFirstPerson(Person $firstPerson): self
    {
        $this->firstPerson = $firstPerson;

        return $this;
    }

    public function getFirstPerson(): ?Person
    {
        return $this->firstPerson;
    }

    public function setSecondPerson(Person $secondPerson): self
    {
        $this->secondPerson = $secondPerson;

        return $this;
    }

    public function getSecondPerson(): ?Person
    {
        return $this->secondPerson;
    }

    public function setDifference(int $difference): void
    {
        $this->difference = $difference;
    }

    public function getDifference(): int
    {
        return $this->difference;
    }
}
