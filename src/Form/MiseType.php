<?php

namespace App\Form;

use App\Entity\Miseajour;
use App\Entity\Jeux;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class MiseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('nomjeu')
            ->add('pubmise')
            ->add('versionmise')
            ->add('taillemise')
            ->add('descmise')

            ->add('jeux',EntityType::class,['class'=> Jeux::class,
                'choice_label'=> 'idjeux',
                'label'=>false,
                'required'=>false,
                'placeholder'=> "Choose your id"])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Miseajour::class,
        ]);
    }
}
