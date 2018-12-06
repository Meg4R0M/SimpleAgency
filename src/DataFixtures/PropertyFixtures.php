<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $property = new Property();
        $property->setAddress('1 Rue de la motte')
            ->setBedrooms(4)
            ->setCity('Nîmes')
            ->setDescription('Description appart rue de la motte à Nîmes')
            ->setFloor(2)
            ->setHeat(1)
            ->setPostalCode('30000')
            ->setPrice(250000)
            ->setRooms(6)
            ->setSurface(120)
            ->setTitle('Superbe appart Nîmes');

        $manager->persist($property);

        $property2 = new Property();
        $property2->setAddress('2 Avenue du boulodrome')
            ->setBedrooms(2)
            ->setCity('Marseille')
            ->setDescription('Description appart Avenue du boulodrome à Marseille')
            ->setFloor(1)
            ->setHeat(0)
            ->setPostalCode('13000')
            ->setPrice(300000)
            ->setRooms(2)
            ->setSurface(80)
            ->setTitle('Superbe appart Marseille');

        $manager->persist($property2);

        $property3 = new Property();
        $property3->setAddress('3 Chemin du mas')
            ->setBedrooms(4)
            ->setCity('Montpellier')
            ->setDescription('Description appart Chemin du mas à Montpellier')
            ->setFloor(1)
            ->setHeat(1)
            ->setPostalCode('34000')
            ->setPrice(320000)
            ->setRooms(4)
            ->setSurface(90)
            ->setTitle('Superbe appart Montpellier');

        $manager->persist($property3);

        $property4 = new Property();
        $property4->setAddress('4 lotissement du hameaux')
            ->setBedrooms(2)
            ->setCity('Narbonne')
            ->setDescription('Description appart lotissement du hameaux à Narbonne')
            ->setFloor(4)
            ->setHeat(0)
            ->setPostalCode('11000')
            ->setPrice(180000)
            ->setRooms(3)
            ->setSurface(60)
            ->setTitle('Superbe appart Narbonne');

        $manager->persist($property4);

        $manager->flush();
    }
}
