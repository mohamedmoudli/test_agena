<?php

namespace App\Entity;

use App\Repository\DeptRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeptRepository::class)]
class Dept
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dname = null;

    #[ORM\Column]
    private ?int $deptNo = null;

    #[ORM\Column(length: 255)]
    private ?string $loc = null;

    #[ORM\OneToMany(mappedBy: 'dept', targetEntity: Emp::class)]
    private Collection $emps;

    public function __construct()
    {
        $this->emps = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDname(): ?string
    {
        return $this->dname;
    }

    public function setDname(string $dname): self
    {
        $this->dname = $dname;

        return $this;
    }

    public function getDeptNo(): ?int
    {
        return $this->deptNo;
    }

    public function setDeptNo(int $deptNo): self
    {
        $this->deptNo = $deptNo;

        return $this;
    }

    public function getLoc(): ?string
    {
        return $this->loc;
    }

    public function setLoc(string $loc): self
    {
        $this->loc = $loc;

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
            $emp->setDept($this);
        }

        return $this;
    }

    public function removeEmp(Emp $emp): self
    {
        if ($this->emps->removeElement($emp)) {
            // set the owning side to null (unless already changed)
            if ($emp->getDept() === $this) {
                $emp->setDept(null);
            }
        }

        return $this;
    }
}
