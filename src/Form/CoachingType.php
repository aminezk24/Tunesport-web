<?php

namespace App\Form;

use App\Entity\Coaching;
use App\Entity\Jeux;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoachingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nicknamecoa',TextType::class,['attr'=>array('class'),'label'=>false,'required'=>false,])

            ->add('rankcoa',ChoiceType::class,['choices'=> array(
                'Gold '=>"Gold",
                'Platinum '=>"Platinum",
                'Diamond '=>"Diamond",
                'Challenger '=>"Challenger"),
                'label'=>false,'required'=>false,'placeholder'=> "Choose your rank"])

            ->add('gamecoa',EntityType::class,['class'=> Jeux::class,
                'choice_label'=> 'nomJeux',
                'label'=>false,'required'=>false,'placeholder'=> "Choose your game"])

            ->add('descoa', TextAreaType::class,['attr'=>array('class'),'label'=>false,'required'=>false,])

            ->add('imagecoa',FileType::class,['attr'=>array('class'),'label'=>false,'required'=>false,'mapped'=>false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Coaching::class,
        ]);
    }
}
