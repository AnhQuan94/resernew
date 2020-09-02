<?php

namespace App\Controller;

use App\Entity\Artist;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist", name="artist")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Artist::class);
        $artists = $repository->findAll();

        return $this->render('artist/index.html.twig', [
            'artists' => $artists,
            'resource' => 'artistes',
        ]);
    }

    
   /**
     * @Route("/artist/{id}", name="artist_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Artist::class);
        $artist = $repository->find($id);

        return $this->render('artist/show.html.twig', [
            'artist' => $artist,
        ]);
    }
}

