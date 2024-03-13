<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/song/{id<\d+>}', methods: ['GET'], name: 'api_songs_get_one')]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        $songs = [
            [
                'id' => 1,
                'name' => 'Song jeux video',
                'url' => 'http://commondatastorage.googleapis.com/codeskulptor-demos/pyman_assets/ateapill.ogg',
            ],
            [
                'id' => 2,
                'name' => 'Guitar electrique',
                'url' => 'http://commondatastorage.googleapis.com/codeskulptor-demos/riceracer_assets/music/race2.ogg',
            ],
            [
                'id' => 3,
                'name' => 'NeverGonnaLetDown',
                'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
            ],
            [
                'id' => 4,
                'name' => 'HinaMaysara',
                'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',

            ],
            [
                'id' => 5,
                'name' => 'tomb raider',
                'url' => 'http://codeskulptor-demos.commondatastorage.googleapis.com/pang/paza-moduless.mp3',
            ],
            [
                'id' => 6,
                'name' => 'Nature song',
                'url' => 'http://commondatastorage.googleapis.com/codeskulptor-assets/Epoq-Lepidoptera.ogg',
            ]

        ];
        foreach ($songs as $song) {
            if ($song['id'] === $id) {
                $logger->info('Returning API response for song {song}', ['song' => $id]);
                return $this->json($song);
            }
        }

        return $this->json(['error' => 'Song not found'], 404);
    }
}
