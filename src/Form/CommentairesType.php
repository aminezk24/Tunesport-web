<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Commentaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CommentairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titreCommentaire',TextType::class,['attr'=>array('placeholder'=> 'Enter votre username'),'required'=>false,])
            ->add('contenuCommentaire',TextareaType::class,['attr'=>array('placeholder'=> 'Enter votre commentaire'),'required'=>false,])
            ->add('dateCommentaire',DateTimeType::class,['widget'=>'single_text','required'=>false,])
            ->add('titreArticle',EntityType::class,['class'=> Article::class,

                'choice_label'=> 'titreArticle',
                'label'=>false,
                'required'=>false,
                'placeholder'=> "Choose your Article"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaires::class,
        ]);
    }
}
