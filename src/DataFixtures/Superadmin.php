<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Superadmin extends Fixture
{
    private $names = ['', ''];
    private $colors = ['', ''];

    public function load(ObjectManager $manager)
    {

            $super = new super();
            $super->setName($this->names[rand(0,1)]. ' ' . rand(5, 8));
            $super->setColor($this->colors[rand(0,1)]);
            $super->setPrice(rand(500, 1000));
            $super->setDescription('A wonderful super with ' . rand(10, 50) . ' tricks');

            $manager->persist($super);
        

        $manager->flush();
    }
}
