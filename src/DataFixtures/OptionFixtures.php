<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class OptionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $option = new \App\Entity\Option();
        $option->setName('Ascenceur');
        $manager->persist($option);

        $option2 = new \App\Entity\Option();
        $option2->setName('Adapté PMR');
        $manager->persist($option2);

        $option3 = new \App\Entity\Option();
        $option3->setName('Balcon');
        $manager->persist($option3);

        $manager->flush();

         $this->addReference('option1', $option);
         $this->addReference('option2', $option2);
         $this->addReference('option3', $option3);
    }

    public function getOrder()
    {
        return 2;
    }
}
