<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(CardTypesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(CardTagsTableSeeder::class);
    }
}
