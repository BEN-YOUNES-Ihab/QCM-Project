<?php

namespace App\Entity;

use App\Repository\QCMtestRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QCMtestRepository::class)]
class QCMtest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
