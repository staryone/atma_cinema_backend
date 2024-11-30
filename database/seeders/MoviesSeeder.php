<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::insert([
            [
                'movieID' => 'MOV89I4A',
                'movieTitle' => 'Arcane',
                'duration' => 40,
                'synopsis' => 'Set in Utopian Piltover and the oppressed underground of Zaun, the story follows the origins of two iconic League of Legends champions and the power that will tear them apart.',
                'director' => 'Pascal Charrue',
                'writers' => 'Ash Brannon',
                'ageRating' => 'TV-14',
                'genre' => 'Animation, Action, Adventure',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BOWJhYjdjNWEtMWFmNC00ZjNkLThlZGEtN2NkM2U3NTVmMjZkXkEyXkFqcGc@._V1_SX300.jpg',
                'trailer' => null,
            ],
            [
                'movieID' => 'MOVATA8E',
                'movieTitle' => 'The Dark Knight',
                'duration' => 152,
                'synopsis' => 'When a menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman, James Gordon and Harvey Dent must work together to put an end to the madness.',
                'director' => 'Christopher Nolan',
                'writers' => 'Jonathan Nolan, Christopher Nolan, David S. Goyer',
                'ageRating' => 'PG-13',
                'genre' => 'Action, Crime, Drama',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SX300.jpg',
                'trailer' => null,
            ],
            [
                'movieID' => 'MOVMLEQR',
                'movieTitle' => 'The Matrix',
                'duration' => 136,
                'synopsis' => 'When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.',
                'director' => 'Lana Wachowski, Lilly Wachowski',
                'writers' => 'Lilly Wachowski, Lana Wachowski',
                'ageRating' => 'R',
                'genre' => 'Action, Sci-Fi',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BN2NmN2VhMTQtMDNiOS00NDlhLTliMjgtODE2ZTY0ODQyNDRhXkEyXkFqcGc@._V1_SX300.jpg',
                'trailer' => null,
            ],
            [
                'movieID' => 'MOVUXAVZ',
                'movieTitle' => 'Inception',
                'duration' => 148,
                'synopsis' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.',
                'director' => 'Christopher Nolan',
                'writers' => 'Christopher Nolan',
                'ageRating' => 'PG-13',
                'genre' => 'Action, Adventure, Sci-Fi',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_SX300.jpg',
                'trailer' => null,
            ],
            [
                'movieID' => 'MOVWXHER',
                'movieTitle' => 'Interstellar',
                'duration' => 169,
                'synopsis' => 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.',
                'director' => 'Christopher Nolan',
                'writers' => 'Jonathan Nolan, Christopher Nolan',
                'ageRating' => 'PG-13',
                'genre' => 'Adventure, Drama, Sci-Fi',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BYzdjMDAxZGItMjI2My00ODA1LTlkNzItOWFjMDU5ZDJlYWY3XkEyXkFqcGc@._V1_SX300.jpg',
                'trailer' => null,
            ],
            [
                'movieID' => 'MOVXKMHM',
                'movieTitle' => 'Avengers: Endgame',
                'duration' => 181,
                'synopsis' => "After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.",
                'director' => 'Anthony Russo, Joe Russo',
                'writers' => 'Christopher Markus, Stephen McFeely, Stan Lee',
                'ageRating' => 'PG-13',
                'genre' => 'Action, Adventure, Drama',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BMTc5MDE2ODcwNV5BMl5BanBnXkFtZTgwMzI2NzQ2NzM@._V1_SX300.jpg',
                'trailer' => null,
            ],
            [
                'movieID' => 'MOVYFPS1',
                'movieTitle' => 'WALL·E',
                'duration' => 98,
                'synopsis' => 'A robot who is responsible for cleaning a waste-covered Earth meets another robot and falls in love with her. Together, they set out on a journey that will alter the fate of mankind.',
                'director' => 'Andrew Stanton',
                'writers' => 'Andrew Stanton, Pete Docter, Jim Reardon',
                'ageRating' => 'G',
                'genre' => 'Animation, Adventure, Family',
                'cover' => 'https://m.media-amazon.com/images/M/MV5BMjExMTg5OTU0NF5BMl5BanBnXkFtZTcwMjMxMzMzMw@@._V1_SX300.jpg',
                'trailer' => null,
            ],
        ]);
    }
}
