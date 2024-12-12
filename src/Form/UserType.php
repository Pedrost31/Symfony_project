<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nom d\'utilisateur', // Le label à afficher
                'attr' => [
                    'placeholder' => 'Entrez votre nom d\'utilisateur' // Le texte du placeholder
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email', // Le label à afficher
                'attr' => [
                    'placeholder' => 'Entrez votre adresse email' // Le texte du placeholder
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe', // Le label à afficher
                'attr' => [
                    'placeholder' => 'Entrez votre mot de passe' // Le texte du placeholder
                ]
            ])
            ->add('confirm_password', PasswordType::class, [
                'mapped' => false, // Ce champ ne correspond pas à une colonne dans la base de données
                'label' => 'Confirmer le mot de passe', // Le label à afficher
                'attr' => [
                    'placeholder' => 'Confirmez votre mot de passe' // Le texte du placeholder
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
