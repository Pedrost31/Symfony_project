<?php
// src/Controller/ContactController.php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Créer une nouvelle instance de Contact
        $contact = new Contact();

        // Créer le formulaire
        $form = $this->createForm(ContactType::class, $contact);

        // Gérer la requête
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Persister les données dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();

            // Ajouter un message flash et rediriger
            $this->addFlash('success', 'Your message has been sent successfully!');
            return $this->redirectToRoute('contact');
        }

        // Renvoyer la vue avec le formulaire
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(), // Passer la vue du formulaire
        ]);
    }
}
