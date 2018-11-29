<?php

namespace App\DataFixtures;

use App\Entity\Arts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
    $arts = new Arts();
    $arts->setUsername('me');

    $arts->setPassword(
        $this->encoder->encodePassword($arts, 'qwerty')
    );
    $arts->setVoornaam('Michael');
    $arts->setTussenvoegsel('');
    $arts->setAchternaam('Schaap');
    $arts->setSpecialiteit('Iets');
    $arts->setAdres('wegstraat');
    $arts->setPostcode('2222 PX');
    $arts->setStad('den haag');
    $arts->setEmail('michaelschaap123@gmail.com');
    $arts->setTelefoonnummer('06 25328754');

    $manager->persist($arts);

    $manager->flush();
    }
}
