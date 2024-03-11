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
                'name' => 'StartBoy',
                'url' => 'https://node09-cdn.dl-api.com/dl?hash=YNoO9Ex%2FRie%2BIKhUF2frJuKUDeLheryXWz0PEf7P0bC7q%2Fxt%2FAGTYq8BLNr7g7pPhKYRxFvWjr2XRv4Q2k4JTQfh83fJRS2PdQlgmVr1nkZ5UDculk9dG%2Fr8HTDaGTi3oqX92lk9zhlpf6UAHFSgvNWkvdg3tsmWiLNCEmmG%2BVmGuQJVrzTPJmFkXvOSUC2vv%2BbV7tsGZ8RZXnautyzTDdsX%2BCfCXdlGKIr8x0AWhhpy5Y3lVLVVp1nIHovGR28s',
            ],
            [
                'id' => 2,
                'name' => 'SaveYourTears',
                'url' => 'https://node10-cdn.dl-api.com/dl?hash=ecdIFOj%2BHSA6VgdKyhZ1eXvR4VEwG65WlAqmgW0zbEuCFogxVSMnxBY0sCEpQ%2FpFbRDbBfpgiNPnQdnlACYvKUQYkiUYVrGc7Uhvzy6RHJ%2FUw6j9gOljDslVaEelNwHY%2FNsgS0U9fe1FTIPC143ybuL22IZagd1NSsk1PativQQJRrz36VYzYGoiWC1RuGO2Qe0PH5%2FFJVt0%2FkiZrEPzMOdREfb1%2FCrTb5Tcq8gMr446hUytPQ8yu4GuuOwVn3Tx',
            ],
            [
                'id' => 3,
                'name' => 'NeverGonnaLetDown',
                'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
            ],
            [
                'id' => 4,
                'name' => 'HinaMaysara',
                'url' => 'https://rildi.sunproxy.net/file/VDRGdEt2MjRxcU5ZaFc1MFAwa3lqYmFKWkFydGVZeG1KbmNiNE5JeVM2aXdGMEJEVmY1ZGpSSkMrRFBuRGRnLzVqRHRhRDhGdUJMWTdyKzJWZXZ6RWszWHljbXZjSjZQYWIzRzBHYXlpUDA9/Zomra_-_el_hin-maysara_(Hydr0.org).mp3',
            ],
            [
                'id' => 5,
                'name' => 'Reminder',
                'url' => 'https://node05-cdn.dl-api.com/dl?hash=BNYdk5LyrgUM%2BBHUXiSoP5m8L74J7YS0bV1dpnMKPfgbWlFq5Gz%2BCD%2FYLUXUjbNevkeia8lu0aITxwgOWwiNPehBcYiCBqrKIh8mzU8LN22Sh7P%2BiLu440pIGFQ12qv3OKcqKHmtLNuvqxgBIbO1kCX8lXn5f4l0UA%2F4nVZKHnjKoQr04V3rgSzwmsb69cxscY5KEx%2FmdMnB9f4Hgw3I7Q%3D%3D',
            ],
            [
                'id' => 6,
                'name' => 'InYourEyes',
                'url' => 'https://node02-cdn.dl-api.com/dl?hash=CPDB4KT0eCmCyH0RjF%2F1k%2B9YEIOv9TqDqoRZnBpoMBFmMv3g5wY2YBKbRVPJNbHuKBTrXytewOZupIxowpgSlotw%2Fc%2BYYh5whH90gD2anGAINJlCfa2%2FtGVohijuoaI%2BBDN8q34ctVlEvkBNAVZ4d%2BBXKETcLJAeOPS8BOvnzIxEbCHZSrkYPjw9KNGERLszWPvqgEcxDLGH9N6bg00GH6lIqEGhmoQ%2B8i5Hcjqte1l8Rtv%2BzGazjCOSMrX2AimTOawDZIQSYsn%2BPTQmG28QXA%3D%3D',
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
