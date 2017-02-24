<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'user_type_id' => 1,
        ]);
        $first_names = [
            'Rollan', 'Adam', 'Antony', 'Charles', 'Edouard', 'Felix', 'Isaac', 'Julien', 'Malic',
            'Malik', 'Patrick', 'Michael', 'Alice', 'Alexia', 'Aurelie', 'Chloe', 'Clara',
            'Camille', 'Catherine', 'Amelia', 'Lea', 'Juliette', 'Justine', 'Sarah', 'John',
            'Borris', 'Bertran', 'Paul', 'Rene', 'Bob', 'Roger', 'Joël', 'Olivier', 'Simon',
            'Victor', 'Alex', 'Antoine'
        ];
        $last_names = [
            'Trump', 'Tremblay', 'Gagnon', 'Roy', 'Cote', 'Bouchard', 'Laberge', 'Chan', 'Ranger',
            'Morin', 'Fortin', 'Gagne', 'Pellerin', 'Lagace', 'Lafrance', 'Miler', 'Barbeau',
            'Nolet', 'Sauve', 'Rivest', 'Lepine', 'Gouin', 'Caron'
        ];
        $domains = [
            'com', 'fr', 'co', 'info', 'jobs', 'net', 'org', 'pro', 'cat', 'asia', 'ca', 'tel',
             'gov', 'edu', 'coop'
         ];
        $servers = ['gmail', 'yahoo', 'hotmail', 'outlook', 'universite'];

        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'username' => $first_names[rand(0, count($first_names)-1)] . $i,
                'email' => $first_names[rand(0, count($first_names)-1)] .
                $last_names[rand(0, count($last_names)-1)] . $i . '@' .
                $servers[rand(0, count($servers)-1)] . '.' . $domains[rand(0, count($domains)-1)],
                'password' => Hash::make('Admin@1234'),
            ]);
        }
    }
}
