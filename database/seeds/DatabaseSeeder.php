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
        $this->call(CardExercisesTableSeeder::class);
        $this->call(CardsTableSeeder::class);
        $this->call(CardTagsTableSeeder::class);
        $this->call(CardTypesTableSeeder::class);
        $this->call(ChaptersTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ExercisesTableSeeder::class);
        $this->call(FieldsTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserTypesTableSeeder::class);
    }
}
