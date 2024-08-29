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

class CommandesType extends AbstractType
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


            ->add('promo', EntityType::class, [
                'class' => Promo::class,
                'choice_label' => 'titre', // Assurez-vous d'ajuster cela en fonction du champ de la promo que vous voulez afficher
                'disabled' => true,
                'label' => 'Promo',
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
