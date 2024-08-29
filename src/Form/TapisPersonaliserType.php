<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\TapisPersonaliser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TapisPersonaliserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('name')
            ->add('Telephone')
            ->add('Email')
            ->add('Description', TextareaType::class, [ // Utilisez TextareaType
                'attr' => ['placeholder' => 'Entrez Votre Description '],
            ])
            ->add('ImageFile2', VichImageType::class, [
                'label' => 'Image 2',
                'required' => false,
            ])
            ->add('ImageFile1', VichImageType::class, [
                'label' => 'Image 1',
                'required' => false,
            ])

            ->add('ImageFile3', VichImageType::class, [
                'label' => 'Image 3',
                'required' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Commander',
                'attr' => ['class' => 'btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TapisPersonaliser::class,
        ]);
    }
}
