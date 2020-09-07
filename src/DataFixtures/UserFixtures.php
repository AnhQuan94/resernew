<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\DataFixtures\RoleFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $users = [
            [
                'username'=>'eee',
                'password'=>'eeeeee',
                'email'=>'eee@gmail.com',
                
            ],
            [
                'username'=>'aaa',
                'password'=>'aaaaaa',
                'email'=>'aaa@gmail.com',

            ],
        ];

        foreach($users as $record) {
            $user = new User();

            $user->setUsername($record['username']);

            $user->setPassword($this->passwordEncoder->encodePassword($user,$record['password']));
            

           
            $user->setEmail($record['email']);
           
            
            $manager->persist($user);
            
            $this->addReference($record['username'], $user);
        }
        
        $manager->flush();
    }

   
}