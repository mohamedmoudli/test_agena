<?php

namespace App\Entity;

use App\Repository\ManagersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManagersRepository::class)]
class Managers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $ename = null;

    #[ORM\OneToMany(mappedBy: 'mgr', targetEntity: Emp::class)]
    private Collection $emps;

    public function __construct()
    {
        $this->emps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEname(): ?string
    {
        return $this->ename;
    }

    public function setEname(string $ename): self
    {
        $this->ename = $ename;

        return $this;
    }

    /**
     * @return Collection<int, Emp>
     */
    public function getEmps(): Collection
    {
        return $this->emps;
    }

    public function addEmp(Emp $emp): self
    {
        if (!$this->emps->contains($emp)) {
            $this->emps->add($emp);
            $emp->setMgr($this);
        }

        return $this;
    }

    public function removeEmp(Emp $emp): self
    {
        if ($this->emps->removeElement($emp)) {
            // set the owning side to null (unless already changed)
            if ($emp->getMgr() === $this) {
                $emp->setMgr(null);
            }
        }

        return $this;
    }
}
