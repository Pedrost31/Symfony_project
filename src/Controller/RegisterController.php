<?php
namespace App\Controller;

use App\Form\UserType;
use App\Entity\User; // Importez l'entité User
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créez un nouvel utilisateur
        $user = new User();

        // Créez le formulaire lié à l'entité User
        $form = $this->createForm(UserType::class, $user);

        // Traitez la soumission du formulaire
        $form->handleRequest($request);

        // Vérifiez si le formulaire a été soumis et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $user->getPassword();
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $user->setPassword($hashedPassword);

            // Persistez l'entité en base de données
            $entityManager->persist($user);
            $entityManager->flush();

            // Redirigez vers une autre page, par exemple la page de connexion après l'enregistrement
            return $this->redirectToRoute('app_login');
        }

        // Rendu de la vue avec le formulaire
        return $this->render('inscription.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
