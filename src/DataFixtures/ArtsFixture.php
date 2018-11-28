<?php

namespace App\DataFixtures;

use App\Entity\Arts;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ArtsFixture extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
    $arts = new Arts();
    $arts->setUsername('first');

    $arts->setPassword(
        $this->encoder->encodePassword($arts, 'qwerty')
    );

    $arts->setEmail('arts@gmail.com');

    $manager->persist($arts);

    $manager->flush();
    }
}
