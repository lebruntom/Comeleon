<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixture extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        //création d'un nouvel User
        $user = new User();
        $user->setEmail('tomlebrun27@gmail.com');
        $user->setRoles(array('ROLE_ADMIN'));


        //attribution et encodage du mot de passe 
        $user->setPassword($this->encoder->encodePassword($user,'admin'));


        //envoi dans la base de données
        $manager->persist($user);
        $manager->flush();
    }
}
