<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('heure', TimeType::class, [
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('nombreDeCouvert', ChoiceType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ],
                'choices' => [
                    'un' => 1,
                    'deux' => 2,
                    'trois' => 3,
                    'quatre' => 4,
                    'cinq' => 5,
                    'six' => 6,
                    'sept' => 7,
                    'huit' => 8,
                ]
            ])
            ->add('nom', TextType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('phone', TextType::class, [
                'label' => 'téléphone',
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
            ->add('email', EmailType::class,[
                'attr' => [
                    'class' => 'form-floating'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
