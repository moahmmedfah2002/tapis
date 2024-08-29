<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Longueur')
            ->add('Largeur')
            ->add('couleur')
            ->add('prix')
            ->add('Disponabilite')
            ->add('Etat')
            ->add('Description')
            ->add('Poids')
            ->add('Model')
            ->add('Qualite')
            ->add('Matiere')
            ->add('Titre')
            ->add('reference')
            ->add('Image')
            ->add('updatedAt')
            ->add('Category')
            ->add('SousCategories')
            ->add('Types')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
