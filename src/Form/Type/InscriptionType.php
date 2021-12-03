<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

/*
class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $contrainte = new NotBlank();
        $Regex = new Regex(['pattern' => "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", "message" =>'You must have eight characters including a letter and a number']);

        $builder->add('email', EmailType::class,[
            'constraints'=>[$contrainte, 
            new Email(array("message" => "Email not valid"))]
        ])

            ->add('mot_de_passe', RepeatedType::class,[
                'invalid_message' => 'The password is not the same as the confirmation',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation mot de passe'],
                'constraints' => [$Regex]
            ])

            ->add('Submit', SubmitType::class);
    }
}
*/

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $contrainte = new NotBlank();
        $Regex = new Regex(['pattern' => "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", "message" =>'You must have eight characters including a letter and a number']);

        $builder->add('email', EmailType::class,[
            'constraints'=>[$contrainte, 
            new Email(array("message" => "Email not valid"))]
        ])

            ->add('mdp', RepeatedType::class,[
                'invalid_message' => 'The password is not the same as the confirmation',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation mot de passe'],
                'constraints' => [$Regex]
            ])

            ->add('Submit', SubmitType::class);
    }
}
