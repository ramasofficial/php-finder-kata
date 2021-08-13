<?php

declare(strict_types = 1);

namespace CodelyTV\FinderKataTest\Algorithm;

use DateTime;
use PHPUnit\Framework\TestCase;
use CodelyTV\FinderKata\Algorithm\Person;
use CodelyTV\FinderKata\Algorithm\PersonBirthdateFinder;
use CodelyTV\FinderKata\Algorithm\PersonBirthdateFinderConfig;

final class FinderTest extends TestCase
{
    /** @var Person */
    private Person $sue;

    /** @var Person */
    private Person $greg;

    /** @var Person */
    private Person $sarah;

    /** @var Person */
    private Person $mike;

    protected function setUp()
    {
        $this->sue = new Person();
        $this->sue->setName('Sue');
        $this->sue->setBirthDate(new DateTime("1950-01-01"));

        $this->greg = new Person();
        $this->greg->setName('Greg');
        $this->greg->setBirthDate(new DateTime("1952-05-01"));

        $this->sarah = new Person();
        $this->sarah->setName('Sarah');
        $this->sarah->setBirthDate(new DateTime("1982-01-01"));

        $this->mike = new Person();
        $this->mike->setName('Mike');
        $this->mike->setBirthDate(new DateTime("1979-01-01"));
    }

    /** @test */
    public function should_return_empty_when_given_empty_list()
    {
        $list   = [];
        $finder = new PersonBirthdateFinder($list);

        $result = $finder->find(PersonBirthdateFinderConfig::CLOSEST);

        $this->assertEquals(null, $result->getFirstPerson());
        $this->assertEquals(null, $result->getSecondPerson());
    }

    /** @test */
    public function should_return_empty_when_given_one_person()
    {
        $list   = [];
        $list[] = $this->sue;
        $finder = new PersonBirthdateFinder($list);

        $result = $finder->find(PersonBirthdateFinderConfig::CLOSEST);

        $this->assertEquals(null, $result->getFirstPerson());
        $this->assertEquals(null, $result->getSecondPerson());
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->greg;
        $finder = new PersonBirthdateFinder($list);

        $result = $finder->find(PersonBirthdateFinderConfig::CLOSEST);

        $this->assertEquals($this->sue, $result->getFirstPerson());
        $this->assertEquals($this->greg, $result->getSecondPerson());
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new PersonBirthdateFinder($list);

        $result = $finder->find(PersonBirthdateFinderConfig::FURTHEST);

        $this->assertEquals($this->greg, $result->getFirstPerson());
        $this->assertEquals($this->mike, $result->getSecondPerson());
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new PersonBirthdateFinder($list);

        $result = $finder->find(PersonBirthdateFinderConfig::FURTHEST);

        $this->assertEquals($this->sue, $result->getFirstPerson());
        $this->assertEquals($this->sarah, $result->getSecondPerson());
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new PersonBirthdateFinder($list);

        $result = $finder->find(PersonBirthdateFinderConfig::CLOSEST);

        $this->assertEquals($this->sue, $result->getFirstPerson());
        $this->assertEquals($this->greg, $result->getSecondPerson());
    }
}
