<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreArticle',TextType::class,['attr'=>array('placeholder'=> 'Enter le titre'),'required'=>false,])
            ->add('descriptionArticle',TextareaType::class,['attr'=>array('placeholder'=> 'Enter la description'),'required'=>false,])
            ->add('dateArticle',DateTimeType::class,['widget'=>'single_text','required'=>false,])
            ->add('my_file',FileType::class,['attr'=>array('placeholder'=> 'choisir une image'),'required'=>false,
                'mapped' => false,
                'label' => "upload image",
                'required'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
