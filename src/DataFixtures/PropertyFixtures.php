<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $property = new Property();

            $property->setAddress($faker->address)
                ->setBedrooms($faker->numberBetween(1,9))
                ->setCity($faker->city)
                ->setDescription($faker->sentences(3, true))
                ->setFloor($faker->numberBetween(0,15))
                ->setHeat($faker->numberBetween(0, count(Property::HEAT) - 1))
                ->setPostalCode($faker->postcode)
                ->setPrice($faker->numberBetween(35000,1000000))
                ->setRooms($faker->numberBetween(1,10))
                ->setSurface($faker->numberBetween(20,350))
                ->setTitle($faker->unique()->words(3, true));

            $manager->persist($property);
        }


        $manager->flush();
    }
}
