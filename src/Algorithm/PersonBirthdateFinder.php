<?php

declare(strict_types=1);

namespace CodelyTV\FinderKata\Algorithm;

final class PersonBirthdateFinder
{
    /** @var Person[] */
    private array $persons;

    public function __construct(array $persons)
    {
        $this->persons = $persons;
    }

    public function find(int $option): PersonResult
    {
        $rows = PersonBirthdateHandler::handle($this->persons);

        if ($this->isEmpty($rows)) {
            return new PersonResult();
        }

        return PersonBirthdateDifferenceHandler::handle($rows, $option);
    }

    private function isEmpty(array $array): bool
    {
        return empty($array);
    }
}
