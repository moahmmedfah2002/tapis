<?php

namespace App\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Commande;
use App\Entity\Produit;
use App\Entity\Promo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullName')
            ->add('telephone')
            ->add('adress', TextareaType::class, [ // Utilisez TextareaType
                'attr' => ['placeholder' => 'Entrez Votre Adress'],
            ])
            ->add('email')

            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => 'titre', // Choisir le champ qui représente le titre du produit
                'disabled' => true, // Pour désactiver le champ et le rendre non éditable
                'label' => 'Produit',
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Commander',
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
