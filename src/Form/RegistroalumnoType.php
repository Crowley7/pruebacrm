<?php

namespace App\Form;

use App\Entity\Alumno;
use App\Entity\Curso;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('Seleccioncursos', EntityType::class,[
                'class' => Curso::class,
                'label' => 'Selecciona tus cursos: ',
                'choice_label' => 'nombre',
                'multiple' => true,
                'expanded' => true,
                'mapped' => false,
            ])
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
