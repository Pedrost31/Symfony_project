<?php
// src/Controller/RegisterController.php

namespace App\Controller;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    #[Route('/register')]
    public function search(EntityManagerInterface $entityManagerInterface): Response
    {
        $form=$this->createForm(UserType::class);
        return $this->render('inscription.html.twig',[
            'form'=>$form->createView(),
        ]);
    }
}