<?php

namespace App\Form;

use App\Entity\Alumno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditaralumnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $defaultRol = $options['default_rol'];
        $builder
            ->add('dni',null,[
                'attr' => [
                    'maxlength' => 8,
                    'pattern' => '[0-9]*',
                ],
                
            ])
            ->add('nombre')
            ->add('apellidoPaterno')
            ->add('apellidoMaterno')
            ->add('Seleccionrol',ChoiceType::class, [
                'label' => 'Rol',
                'choices' => [
                    'Generico' => 'ROLE_USER',
                    'Delegado' => 'ROLE_DELEGATE',
                ]
                , 
                'mapped' => false,
                'data' => $defaultRol,
                
            ])
            ->add('Guardar', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Alumno::class,
            'default_rol' => 'ROLE_USER'
        ]);
    }
}
