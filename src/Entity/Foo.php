<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\FooRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=FooRepository::class)
 */
class Foo
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    #[Assert\NotBlank]
    #[Assert\Length(min:2)]
    private string $name;
    
    /**
     * @var Collection<int, Bar>
     * @ORM\OneToMany(targetEntity=Bar::class, mappedBy="foo", orphanRemoval=true, cascade={"persist"})
     */
    #[Assert\Count(min: 1)]
    #[Assert\Valid]
    private Collection $bars;
    
    /**
     * @var Collection<int, Baz>
     * @ORM\OneToMany(targetEntity=Baz::class, mappedBy="foo", orphanRemoval=true, cascade={"persist"})
     */
    #[Assert\Count(min: 1)]
    #[Assert\Valid]
    private Collection $bazs;

    /**
     * @ORM\OneToMany(targetEntity=Qux::class, mappedBy="foo", orphanRemoval=true, cascade={"persist"})
     */
    #[Assert\Count(min: 1)]
    #[Assert\Valid]
    private Collection $quxes;
    
    
    public function __construct()
    {
        $this->bars = new ArrayCollection();
        $this->bazs = new ArrayCollection();
        $this->quxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Bar>
     */
    public function getBars(): Collection
    {
        return $this->bars;
    }

    public function addBar(Bar $bar): self
    {
        if (!$this->bars->contains($bar)) {
            $this->bars[] = $bar;
            $bar->setFoo($this);
        }

        return $this;
    }

    public function removeBar(Bar $bar): self
    {
        if ($this->bars->removeElement($bar)) {
            if ($bar->getFoo() === $this) {
                $bar->setFoo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Baz>
     */
    public function getBazs(): Collection
    {
        return $this->bazs;
    }

    public function addBaz(Baz $baz): self
    {
        if (!$this->bazs->contains($baz)) {
            $this->bazs[] = $baz;
            $baz->setFoo($this);
        }

        return $this;
    }

    public function removeBaz(Baz $baz): self
    {
        if ($this->bazs->removeElement($baz)) {
            if ($baz->getFoo() === $this) {
                $baz->setFoo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Qux>
     */
    public function getQuxes(): Collection
    {
        return $this->quxes;
    }

    public function addQux(Qux $qux): self
    {
        if (!$this->quxes->contains($qux)) {
            $this->quxes[] = $qux;
            $qux->setFoo($this);
        }

        return $this;
    }

    public function removeQux(Qux $qux): self
    {
        if ($this->quxes->removeElement($qux)) {
            if ($qux->getFoo() === $this) {
                $qux->setFoo(null);
            }
        }

        return $this;
    }
}
