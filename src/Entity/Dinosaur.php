<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dinosaurs")
 */
class Dinosaur
{
    const LARGE = 10;

    const HUGE = 30;

    /**
     * @ORM\Column(type="integer")
     */
    private $length = 0;

    /**
     * @ORM\Column(type="string")
     */
    private $genus;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isCarnivorous;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enclosure", inversedBy="dinosaurs")
     */
    private $enclosure;

    public function __construct(string $genus = 'Unknown', bool $isCarnivorous = false)
    {
        $this->genus = $genus;
        $this->isCarnivorous = $isCarnivorous;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setLength(int $length)
    {
        $this->length = $length;

        return $this;
    }

    public function getSpecification(): string
    {
        return sprintf(
            'The %s %scarnivorous dinosaur is %d meters long',
            $this->genus,
            $this->isCarnivorous ? '' : 'non-',
            $this->length
        );
    }

    public function getGenus(): string
    {
        return $this->genus;
    }

    public function isCarnivorous()
    {
        return $this->isCarnivorous;
    }
}