<?php

namespace App\Form;

use App\Entity\Individual;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class IndividualRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Votre nom'],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['placeholder' => 'Votre prénom'],
            ])
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'attr' => ['placeholder' => 'Votre pseudo'],
                'required' => false,
            ])
            ->add('familySituation', TextType::class, [
                'label' => 'Situation familiale',
                'attr' => ['placeholder' => 'Votre situation familiale'],
            ])
            ->add('ageRange', IntegerType::class, [
                'label' => 'Tranche d\'âge',
                'attr' => ['placeholder' => 'Votre tranche d\'âge'],
            ])
            ->add('centerInterest', TextType::class, [
                'label' => 'Centre d\'intérêt',
                'attr' => ['placeholder' => 'Votre centre d\'intérêt'],
            ])
            ->add('save', SubmitType::class,
                [
                    'label' => 'register1',
                ])
        ;

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Individual::class,
        ]);
    }
}