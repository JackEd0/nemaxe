<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('grades', 'cards.grade_id', '=', 'grades.id')
            ->join('fields', 'cards.field_id', '=', 'fields.id')
            ->join('card_exercises_xref', 'cards.id', '=', 'card_exercises_xref.card_id')
            ->join('exercises', 'card_exercises_xref.exercise_id', '=', 'exercises.id')
            ->select('cards.*',
                'exercises.content as exercise_content',
                'card_types.name as card_type_name',
                'users.username as user_username',
                'grades.short_name as grade_short_name',
                'fields.name as field_name')
            ->limit(100)
            ->groupBy('cards.id')
            ->get();
        return view('cards.cards_index')->with(compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = DB::table('subjects')->get();
        $card_types = DB::table('card_types')->get();
        $fields = DB::table('fields')->get();
        $grades = DB::table('grades')->get();
        $chapters = DB::table('chapters')->where('subject_id', 1)->get();
        $exercises = DB::table('exercises')->where('subject_id', 1)->get();
        $status = ['pubish' => 'Publie', 'private' => 'Prive'];
        $years = [];
        for ($i=0; $i < 20; $i++) {
            $years[] = $i + 1990;
        }
        return view('cards.cards_form')->with(compact(
            'subjects', 'card_types', 'fields', 'grades', 'status', 'chapters', 'years', 'exercises'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('cards')->insert([
            'number' => DB::table('cards')->max('number') + 1,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'nature' => $request->input('nature'),
            'card_type_id' => $request->input('card_type_id'),
            'user_id' => $request->input('user_id'),
            'twin_id' => $request->input('twin_id')
        ]);

        return redirect('/cards');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $card = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('grades', 'cards.grade_id', '=', 'grades.id')
            ->join('fields', 'cards.field_id', '=', 'fields.id')
            ->where('cards.id', $id)
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username',
                'grades.short_name as grade_short_name',
                'fields.name as field_name')
            ->limit(100)
            ->first();
        $exercises = DB::table('card_exercises_xref')
            ->join('exercises', 'card_exercises_xref.exercise_id', '=', 'exercises.id')
            ->where('card_id', $id)->orderBy('question_order', 'asc')
            ->select('exercises.*')
            ->groupBy('exercises.id')
            ->get();
        foreach ($exercises as $exercise) {
            $questions[$exercise->id] = DB::table('card_exercises_xref')
                ->join('questions', 'card_exercises_xref.question_id', '=', 'questions.id')
                ->where([
                    ['card_id', $id],
                    ['card_exercises_xref.exercise_id', $exercise->id]
                ])
                ->select('questions.*')
                ->orderBy('question_order', 'asc')
                ->get();
        }

        $comments_number = DB::table('comments')->where('card_id', $id)->count();

        return view('cards.cards_show')->with(compact('card', 'comments_number', 'exercises', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('grades', 'cards.grade_id', '=', 'grades.id')
            ->join('fields', 'cards.field_id', '=', 'fields.id')
            ->where('cards.id', $id)
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username',
                'grades.short_name as grade_short_name',
                'fields.name as field_name')
            ->limit(100)
            ->first();
        $exercises = DB::table('card_exercises_xref')
            ->join('exercises', 'card_exercises_xref.exercise_id', '=', 'exercises.id')
            ->where('card_id', $id)->orderBy('question_order', 'asc')
            ->select('exercises.*')
            ->groupBy('exercises.id')
            ->get();
        foreach ($exercises as $exercise) {
            $questions[$exercise->id] = DB::table('card_exercises_xref')
                ->join('questions', 'card_exercises_xref.question_id', '=', 'questions.id')
                ->where([
                    ['card_id', $id],
                    ['card_exercises_xref.exercise_id', $exercise->id]
                ])
                ->select('questions.*')
                ->orderBy('question_order', 'asc')
                ->get();
        }

        $subjects = DB::table('subjects')->get();
        $card_types = DB::table('card_types')->get();
        $fields = DB::table('fields')->get();
        $grades = DB::table('grades')->get();
        $chapters = DB::table('chapters')->where('subject_id', 1)->get();
        $status = ['pubish' => 'Publie', 'private' => 'Prive'];
        $years = [];
        for ($i=0; $i < 20; $i++) {
            $years[] = $i + 1990;
        }
        return view('cards.cards_form')->with(compact(
            'id', 'card', 'comments_number', 'exercises', 'questions',
            'subjects', 'card_types', 'fields', 'grades', 'status', 'chapters', 'years'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('cards')->where('id', $id)
            ->update([
                'number' => DB::table('cards')->max('number') + 1,
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'nature' => $request->input('nature'),
                'card_type_id' => $request->input('card_type_id'),
                'user_id' => $request->input('user_id'),
                'twin_id' => $request->input('twin_id')
            ]);
        return redirect('/cards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('card_exercises_xref')->where('card_id', $id)->delete();
        DB::table('card_chapters_xref')->where('card_id', $id)->delete();
        // DB::table('card_chapters_xref')->where('card_id', $id)->delete();
        DB::table('cards')->where('id', $id)->delete();
        return response()->json(['message' => 'Success!','state' => 200]);
    }

    /**
     * undocumented function summary
     *
     * Undocumented function long description
     *
     * @param type var Description
     * @return return type
     */
    public function search(Request $request)
    {
        $where_clause = [];
        if ($request->input('search') !== null) {
            $where_clause[] = ['exercises.content', 'like', "%{$request->input('search')}%"];
        }
        if ($request->input('type') !== null) {
            $where_clause[] = ['cards.card_type_id', '=', $request->input('type')];
        }
        $cards = DB::table('cards')
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->join('grades', 'cards.grade_id', '=', 'grades.id')
            ->join('fields', 'cards.field_id', '=', 'fields.id')
            ->join('card_exercises_xref', 'cards.id', '=', 'card_exercises_xref.card_id')
            ->join('exercises', 'card_exercises_xref.exercise_id', '=', 'exercises.id')
            ->where($where_clause)
            ->select('cards.*',
                'exercises.content as exercise_content',
                'card_types.name as card_type_name',
                'users.username as user_username',
                'grades.short_name as grade_short_name',
                'fields.name as field_name')
            ->limit(100)
            ->groupBy('cards.id')
            ->get();
        // $parts = [];
        // foreach($cards as $card) {
        //     $temp_exercises = DB::table('card_exercises_xref')->where('card_id', $card->id)->orderBy('question_order', 'asc')->get();
        //     $temp_exercise = DB::table('exercises')->where('id', $temp_exercises[0]->exercise_id)->first();
        //     $parts[$card->id] = ['exercise' => $temp_exercise->content];
        // }
        // return view('search.result')->with(compact('cards', 'parts'));
        return view('search.result')->with(compact('cards'));
    }
}
