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
            'username' => 'Admin',
            //'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin@1234'),
            'user_type_id' => 1,
        ]);
        $firstNameList = array('Rollan', 'Adam', 'Antony', 'Charles', 'Edouard', 'Felix', 'Isaac', 'Julien', 'Malic',
            'Malik', 'Patrick', 'Michael', 'Alice', 'Alexia', 'Aurelie', 'Chloe', 'Clara', 'Camille', 'Catherine',
            'Amelia', 'Lea', 'Juliette', 'Justine', 'Sarah', 'John', 'Borris', 'Bertran', 'Paul', 'Rene', 'Bob',
            'Roger', 'Joël', 'Olivier', 'Simon', 'Victor', 'Alex', 'Antoine');
        $lastNameList = array('Trump', 'Tremblay', 'Gagnon', 'Roy', 'Cote', 'Bouchard', 'Laberge', 'Chan', 'Ranger',
            'Morin', 'Fortin', 'Gagne', 'Pellerin', 'Lagace', 'Lafrance', 'Miler', 'Barbeau', 'Nolet', 'Sauve',
            'Rivest', 'Lepine', 'Gouin', 'Caron');
        $domainList = array('com', 'fr', 'co', 'info', 'jobs', 'net', 'org', 'pro', 'cat', 'asia', 'ca', 'tel', 'gov',
            'edu', 'coop');
        $serverList = array('gmail', 'yahoo', 'hotmail', 'outlook', 'universite');

        for ($i = 0; $i < 20; $i++) {
            DB::table('users')->insert([
                'username' => $firstNameList[rand(0, 36)] . $i,
                'password' => Hash::make('Admin@1234'),
            ]);
        }
    }
}
