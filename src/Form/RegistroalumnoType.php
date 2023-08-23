<?php

namespace App\Form;

use App\Entity\Alumno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Unique;

class RegistroalumnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dni',null,[
                'attr' => [
                    'maxlength' => 8,
                    'pattern' => '[0-9]*',

                ],
                
            ])
            ->add('password')
            ->add('nombre')
            ->add('apellidoPaterno')
            ->add('apellidoMaterno')
            ->add('Seleccionrol',ChoiceType::class, [
                'label' => 'Selecciona el rol',
                'choices' => [
                    'Generico' => 'ROLE_USER',
                    'Delegado' => 'ROLE_DELEGATE',
                ], 
                'mapped' => false,
            ])
            ->add('Registrarse', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alumno::class,
        ]);
    }
}
