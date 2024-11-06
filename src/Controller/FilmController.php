<?php

namespace App\Controller;

use App\Entity\Film;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FilmController extends AbstractController
{
    /**
     * @Route("/film/create", name="film_create", methods={"POST"})
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $film = new Film();

        $film->setTitre($request->request->get('titre'));
        $film->setDuree((int) $request->request->get('duree'));
        $film->setAnneeSortie((int) $request->request->get('anneeSortie'));

        $em->persist($film);
        $em->flush();

        return new Response('Film créé avec succès : ' . $film->getTitre());
    }

    public function update($id, EntityManagerInterface $em, Request $request): Response
    {
        $film = $em->getRepository(Film::class)->find($id);

        if (!$film) {
            return new Response('Film non trouvé');
        }

        $film->setTitre($request->request->get('titre', $film->getTitre()));
        $film->setDuree($request->request->get('duree', $film->getDuree()));
        $film->setAnneeSortie($request->request->get('anneeSortie', $film->getAnneeSortie()));

        $em->flush();

        return new Response('Film mis à jour : ' . $film->getTitre());
    }

    public function delete($id, EntityManagerInterface $em): Response
    {
        $film = $em->getRepository(Film::class)->find($id);

        if (!$film) {
            return new Response('Film non trouvé');
        }

        $em->remove($film);
        $em->flush();

        return new Response('Film supprimé : ' . $film->getTitre());
    }


}


