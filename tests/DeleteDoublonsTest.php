<?php

namespace App\Tests;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DeleteDoublonsTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $em = static::getContainer()->get(EntityManagerInterface::class);
        $em->createQuery("
                DELETE FROM App:Film f 
                WHERE       1<(
                    SELECT COUNT(f2)
                    FROM App:Film f2
                )")->execute();
    }
}
