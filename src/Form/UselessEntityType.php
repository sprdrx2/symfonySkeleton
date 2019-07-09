<?php

namespace App\Form;

use App\Entity\UselessEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UselessEntityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
		->add('string', TextType::class)
		->add('text', TextareaType::class)
		->add('datetime', DateTimeType::class)
		->add('boolean', CheckboxType::class)
		->add('integerValue', IntegerType::class)
		->add('save', SubmitType::class, ['label' => 'save this important work'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UselessEntity::class,
        ]);
    }
}
