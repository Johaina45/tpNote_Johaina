<?php

// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route(path: '/', name: 'app_homepage')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Bienvenue!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }
}
