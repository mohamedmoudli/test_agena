<?php

namespace App\Entity;

use App\Repository\EmpRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpRepository::class)]
#[ORM\Table(name:"emp")]
class Emp
{

    #[ORM\Id]
    #[ORM\Column( name:'EMPNO')]
    private ?string $empNo = null;

    #[ORM\Column(length: 255 , name:'ENAME')]
    private ?string $ename = null;

    #[ORM\Column(length: 255 , name:'JOB')]
    private ?string $job = null;

    #[ORM\Column( name:'MGR')]
    private ?int $mgr = null;

    #[ORM\Column(type: Types::DATE_MUTABLE , name:'HIREDATE' )]
    private ?\DateTimeInterface $hireDate = null;

    #[ORM\Column( name:'COMM' )]
    private ?int $comm = null;

    #[ORM\Column( name:'SAL' )]
    private ?int $sal = null;

    #[ORM\ManyToOne(inversedBy: 'emps'  )]
    private ?Dept $dept = null;



    public function getEmpNo(): ?string
    {
        return $this->empNo;
    }

    public function setEmpNo(string $empNo): self
    {
        $this->empNo = $empNo;

        return $this;
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

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(string $job): self
    {
        $this->job = $job;

        return $this;
    }

    public function getMgr(): ?int
    {
        return $this->mgr;
    }

    public function setMgr(int $mgr): self
    {
        $this->mgr = $mgr;

        return $this;
    }

    public function getHireDate(): ?\DateTimeInterface
    {
        return $this->hireDate;
    }

    public function setHireDate(\DateTimeInterface $hireDate): self
    {
        $this->hireDate = $hireDate;

        return $this;
    }

    public function getComm(): ?int
    {
        return $this->comm;
    }

    public function setComm(int $comm): self
    {
        $this->comm = $comm;

        return $this;
    }

    public function getSal(): ?int
    {
        return $this->sal;
    }

    public function setSal(int $sal): self
    {
        $this->sal = $sal;

        return $this;
    }

    public function getDept(): ?Dept
    {
        return $this->dept;
    }

    public function setDept(?Dept $dept): self
    {
        $this->dept = $dept;

        return $this;
    }
}
