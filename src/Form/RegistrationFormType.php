<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /*$builder
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Individual' => 'individual',
                    'Professional' => 'professional'
                ],
                'label' => 'User Type',
                'mapped' => false, // Ne pas mapper à l'entité User
                'required' => true, // Champs requis
            ]);*/
       /* $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $data = $event->getData();

        });*/
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Adresse email'],
                'label' => false,
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter nos conditions d\'utilisations.',
                    ]),
                ],
            ])

            ->add('plainPassword', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Mot de passe',
                ],
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        'max' => 100,
                    ]),
                ],
            ])
            ->add('plainPasswordConfirm', PasswordType::class, [
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => 'Confirmer le mot de passe',
                ],
                'label' => false,
                'constraints' => [
                    new Callback([
                        'callback' => function ($plainPasswordConfirm, ExecutionContextInterface $context) {
                            $formData = $context->getRoot()->getData();
                            $plainPassword = $formData['plainPassword'];

                            if ($plainPassword !== $plainPasswordConfirm) {
                                $context->buildViolation('La confirmation du mot de passe ne correspond pas.')
                                    ->addViolation();
                            }
                        },
                    ]),
                ],
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Numéro de téléphone'],
            ])
            ->add('adress', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre adresse'],
            ])
            ->add('lastname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre nom'],
            ])
            ->add('firstname', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre prénom'],
            ])
            ->add('pseudo', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre pseudo'],
                'required' => false,
            ])
            ->add('familySituation', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre situation familiale'],
            ])
            ->add('ageRange', IntegerType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre tranche d\'âge'],
            ])
            ->add('centerInterest', TextType::class, [
                'label' => false,
                'attr' => ['placeholder' => 'Votre centre d\'intérêt'],
            ])
            ->add('cheks', IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
