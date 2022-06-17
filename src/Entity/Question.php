<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'text')]
    private $Label;

    #[ORM\Column(type: 'text', nullable: true)]
    private $Image;

    #[ORM\ManyToOne(targetEntity: QCM::class, inversedBy: 'questions')]
    private $id_QCM;

    #[ORM\OneToOne(targetEntity: QuestionType::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private $id_questionType;

    #[ORM\OneToMany(mappedBy: 'id_question', targetEntity: Answers::class)]
    private $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->Label;
    }

    public function setLabel(string $Label): self
    {
        $this->Label = $Label;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getIdQCM(): ?QCM
    {
        return $this->id_QCM;
    }

    public function setIdQCM(?QCM $id_QCM): self
    {
        $this->id_QCM = $id_QCM;

        return $this;
    }

    public function getIdQuestionType(): ?QuestionType
    {
        return $this->id_questionType;
    }

    public function setIdQuestionType(QuestionType $id_questionType): self
    {
        $this->id_questionType = $id_questionType;

        return $this;
    }

    /**
     * @return Collection<int, Answers>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answers $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setIdQuestion($this);
        }

        return $this;
    }

    public function removeAnswer(Answers $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getIdQuestion() === $this) {
                $answer->setIdQuestion(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->Label;
    }
}