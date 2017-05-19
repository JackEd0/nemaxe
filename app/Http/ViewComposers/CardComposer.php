<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CardComposer
{
    public $cards;
    public $parts;
    public $card_types;
    public $fields;
    public $grades;
    public $comments_number = [];
    public $subjects;
    public $chapters;
    public $status;
    public $years;

    /**
     * CardComposer constructor.
     */
    public function __construct()
    {
        $this->cards = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('grades', 'cards.grade_id', '=', 'grades.id')
            ->join('fields', 'cards.field_id', '=', 'fields.id')
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username',
                'grades.short_name as grade_short_name',
                'fields.name as field_name')
            ->get();
        foreach($this->cards as $card) {
            $this->comments_number[] = DB::table('comments')->where('card_id', $card->id)->count();
            $temp_exercises = DB::table('card_exercises_xref')->where('card_id', $card->id)->orderBy('question_order', 'asc')->get();
            $temp_exercise = DB::table('exercises')->where('id', $temp_exercises[0]->exercise_id)->first();
            $temp_questions = [];
            foreach ($temp_exercises as $value) {
                $temp_question = DB::table('questions')->where('id', $value->question_id)->first();
                $temp_questions[] = $temp_question->description;
            }
            $this->parts[$card->id] = [
                'exercise' => $temp_exercise->content,
                'questions' => $temp_questions
            ];
        }

        $this->subjects = DB::table('subjects')->get();
        $this->card_types = DB::table('card_types')->get();
        $this->fields = DB::table('fields')->get();
        $this->grades = DB::table('grades')->get();
        $this->chapters = DB::table('chapters')->where('subject_id', 1)->get();
        $this->status = ['pubish' => 'Publie', 'private' => 'Prive'];
        for ($i=0; $i < 20; $i++) {
            $this->years[] = $i + 1990;
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $subjects = $this->subjects;
        $card_types = $this->card_types;
        $fields = $this->fields;
        $grades = $this->grades;
        $status = $this->status;
        $chapters = $this->chapters;
        $years = $this->years;
        $view->with(compact('subjects', 'card_types', 'fields', 'grades', 'status', 'chapters', 'years'));
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose_index(View $view)
    {
        $cards = $this->cards;
        $parts = $this->parts;
        $comments_number = $this->comments_number;
        $view->with(compact('cards', 'comments_number', 'parts'));
    }
}
