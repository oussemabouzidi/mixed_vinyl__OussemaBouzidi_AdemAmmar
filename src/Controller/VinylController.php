<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    public function homePage(): Response
    {
        $tracks = [
            ['song' => 'StarBoy', 'artist' => 'The Weeknd'],
            ['song' => 'Save your tears', 'artist' => 'The Weeknd'],
            ['song' => 'Never gonna let you down', 'artist' => 'Rick Astly'],
            ['song' => 'حين ميسرة', 'artist' => 'Zomra'],
            ['song' => 'Reminder', 'artist' => 'The Weeknd'],
            ['song' => 'In your eyes', 'artist' => 'The Weeknd'],
        ];
        $title = 'Favorits songs';
        return $this->render('vinyl/homepage.html.twig', [
            'title' => $title,
            'tracks' => $tracks,
        ]);
    }

    #[Route('/browse/{slug}', name: 'app_browsepage')]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : 'All Genres';
        return $this->render(
            'vinyl/browse.html.twig',
            [
                'genre' => $genre
            ]
        );
    }
}
