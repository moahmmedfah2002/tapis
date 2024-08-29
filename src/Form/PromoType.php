<?php

namespace App\Form;

use App\Entity\Promo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PromoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Titre')
            ->add('Ref')
            ->add('Longueur')
            ->add('Image')
            ->add('updatedAt')
            ->add('Largeur')
            ->add('pourcentagePromo')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('prix')
            ->add('Prix_base')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promo::class,
        ]);
    }
}
