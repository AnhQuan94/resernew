<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\DataFixtures\TypeFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TypeFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $types = [
            ['type'=>'comédien'],
            ['type'=>'scénographe'],
            ['type'=>'auteur'],
        ];
        
        foreach ($types as $record) {
            $type = new Type();
            $type->setType($record['type']);
            
            $manager->persist($type);
        }

        $manager->flush();
    }
}
