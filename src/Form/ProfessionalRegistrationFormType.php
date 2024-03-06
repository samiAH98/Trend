<?php

namespace App\Form;

use App\Entity\Professional;
use phpDocumentor\Reflection\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ProfessionalRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('companyName', TextType::class, [
                'label' => 'Nom de l\'entreprise',
                'attr' => ['placeholder' => 'Nom de votre entreprise'],
            ])
            ->add('siretNumber', TextType::class, [
                'label' => 'Numéro Siret',
                'attr' => ['placeholder' => 'Numéro Siret de votre entreprise'],
            ])
            ->add('businessActivity', TextType::class, [
                'label' => 'Domaine d\'activité',
                'attr' => ['placeholder' => 'Activité de l\'entreprise']
             ])
            ->add('sauvegarder', SubmitType::class,
                [
                    'label' => 'register',
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Professional::class,
        ]);
    }
}