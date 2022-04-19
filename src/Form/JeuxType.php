<?php

namespace App\Form;

use App\Entity\Jeux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JeuxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomjeux')
            ->add('datesortjeux')
            ->add('taillejeux')
            ->add('descjeux')
            ->add('platdispojeux')
            ->add('conreqjeux')
            ->add('imageJ', FileType::class , [ 'mapped'=> false])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
          $resolver->setDefaults([
                'data_class' => Jeux::class,        ]);
    }
}
