<?php

namespace App\Entity;

use App\Repository\GroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupRepository::class)]
#[ORM\Table(name: '`group`')]
class Group
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $Name;

    #[ORM\OneToMany(mappedBy: 'groupe', targetEntity: User::class)]
    private $Members;

    #[ORM\OneToOne(targetEntity: QCM::class, cascade: ['persist', 'remove'])]
    private $QCM_id;

    public function __construct()
    {
        $this->Members = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getMembers(): Collection
    {
        return $this->Members;
    }

    public function addMember(User $member): self
    {
        if (!$this->Members->contains($member)) {
            $this->Members[] = $member;
            $member->setGroupe($this);
        }

        return $this;
    }

    public function removeMember(User $member): self
    {
        if ($this->Members->removeElement($member)) {
            // set the owning side to null (unless already changed)
            if ($member->getGroupe() === $this) {
                $member->setGroupe(null);
            }
        }

        return $this;
    }

    public function getQCMId(): ?QCM
    {
        return $this->QCM_id;
    }

    public function setQCMId(?QCM $QCM_id): self
    {
        $this->QCM_id = $QCM_id;

        return $this;
    }
}
