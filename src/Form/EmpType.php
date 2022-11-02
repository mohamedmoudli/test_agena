<?php

namespace App\Form;

use App\Entity\Dept;
use App\Entity\Emp;
use App\Entity\Managers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('empNo')
            ->add('ename')
            ->add('job')
            ->add('mgr',EntityType::class, [
                'class' => Managers::class,
                'choice_label' => 'ename', ])
            ->add('hireDate')
            ->add('comm')
            ->add('sal')
            ->add('dept',EntityType::class, [
        'class' => Dept::class,
        'choice_label' => 'dname', ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emp::class,
        ]);
    }
}
