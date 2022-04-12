<?php

namespace App\Form;

use App\Entity\Categorieproduit;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomP')
            ->add('prixp')
            ->add('descp')
            ->add('dispop')
            ->add('couleurp')
            ->add('quantitep')
            ->add('taillep')
            ->add('categorieproduit',EntityType::class,['class'=> categorieproduit::class,
                'choice_label'=> 'nomCP',
                'label'=>false,
                'required'=>false,
                'placeholder'=> "Choose your category"])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
