<?php

namespace App\Tests\Entity;

use App\Entity\Dinosaur;
use PHPUnit\Framework\TestCase;


class DinosaurTest extends TestCase
{
    public function testSettingLength()
    {
        $dinosaur = new Dinosaur();
        $this->assertSame(0, $dinosaur->getLength());

        $dinosaur->setLength(9);
        $this->assertSame(9, $dinosaur->getLength());

    }

    public function testDinosaurHasNotShrunk()
    {
        $dinosaur = new Dinosaur();
        $dinosaur->setLength(15);

        $this->assertGreaterThan(16, $dinosaur->getLength(), 'The Dinosaur is greater that 12');
    }
}