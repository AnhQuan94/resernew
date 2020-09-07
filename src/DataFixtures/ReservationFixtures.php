<?php

namespace App\DataFixtures;

use App\Entity\Reservation;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\RepresentationFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ReservationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $reservations = [
            [
                'representation'=>'ayiti-20121012133000',
                'user'=>'eee',
                'places'=>2,
            ],
            [
                'representation'=>'cible-mouvante-20121002203000',
                'user'=>'aaa',
                'places'=>1,
            ],
            [
                'representation'=>'cible-mouvante-20121002203000',
                'user'=>'eee',
                'places'=>2,
            ],
            [
                'representation'=>'ceci-n-est-pas-un-chanteur-belge-20121016203000',
                'user'=>'aaa',
                'places'=>3,
            ],
        ];
        
        foreach($reservations as $record) {
            $reservation = new Reservation();

            $reservation->setRepresentation($this->getReference($record['representation']));
            $reservation->setUser($this->getReference($record['user']));

            $reservation->setPlaces($record['places']);
                        
            $this->addReference($record['representation']."-".$record['user'], $reservation);

            $manager->persist($reservation);
        }

        $manager->flush();
    }

    public function getDependencies(): array {
        return [
            RepresentationFixtures::class,
            UserFixtures::class,
        ];
    }

}