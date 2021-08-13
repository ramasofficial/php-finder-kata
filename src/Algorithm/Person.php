<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

use DateTime;

final class Person
{
    private string $name;

    private DateTime $birthDate;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBirthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate): void
    {
        $this->birthDate = $birthDate;
    }
}
