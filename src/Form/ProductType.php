<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom du produit',  // Label en français
            ])
            ->add('description', null, [
                'label' => 'Description du produit',  // Label en français
            ])
            ->add('price', null, [
                'label' => 'Prix',  // Label en français
            ])
            ->add('image', null, [
                'label' => 'Image du produit',  // Label en français
            ])
            ->add('creation_date', null, [
                'widget' => 'single_text',
                'label' => 'Date de création',  // Label en français
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
                'label' => 'Utilisateur',  // Label en français
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
