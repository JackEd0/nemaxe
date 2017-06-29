<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $card_id = DB::table('cards')->insertGetId([
            'card_type_id' => $request->input('card_type_id'),
            'year' => $request->input('year'),
            'subject_id' => $request->input('subject_id'),
            'field_id' => $request->input('field_id'),
            'grade_id' => $request->input('grade_id'),
            'duration' => $request->input('duration'),
            'status' => $request->input('btn_save') === null ? 'publish' : 'draft',
            'user_id' => Auth::id()
        ]);
        // insert chapters
        $chapter_ids = $request->input('chapter_ids') !== null ? $request->input('chapter_ids') : [];
        foreach ($chapter_ids as $chapter_id) {
            DB::table('card_chapters_xref')->insert([
                'card_id' => $card_id,
                'chapter_id' => $chapter_id
            ]);
        }
        // insert exercises
        foreach ($request->input('exercises') as $exercise_index => $exercise) {
            $exercise_id = DB::table('exercises')->insertGetId([
                'content' => $exercise,
                'subject_id' => $request->input('subject_id'),
                'grade_id' => $request->input('grade_id')
            ]);
            $temp_questions = $request->input('questions');
            $temp_questions = isset($temp_questions[$exercise_index]) ? $temp_questions[$exercise_index] : [];
            foreach ($temp_questions as $question_index => $question) {
                $question_id = DB::table('questions')->insertGetId([
                    'description' => $question
                ]);
                DB::table('card_exercises_xref')->insert([
                    'card_id' => $card_id,
                    'exercise_id' => $exercise_id,
                    'question_id' => $question_id,
                    'question_order' => $question_index + 1
                ]);
            }
        }
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
        $chapters = DB::table('chapters')->where('subject_id', $card->subject_id)->get();
        $card_chapters = DB::table('card_chapters_xref')->where('card_id', $id)->get();
        $card_chapters = !empty($card_chapters) ? $card_chapters->pluck('chapter_id')->all() : [];
        $status = ['pubish' => 'Publie', 'private' => 'Prive'];
        $years = [];
        for ($i=0; $i < 20; $i++) {
            $years[] = $i + 1990;
        }
        return view('cards.cards_form')->with(compact(
            'id', 'card', 'comments_number', 'exercises', 'questions', 'card_chapters',
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
                'card_type_id' => $request->input('card_type_id'),
                'year' => $request->input('year'),
                'subject_id' => $request->input('subject_id'),
                'field_id' => $request->input('field_id'),
                'grade_id' => $request->input('grade_id'),
                'duration' => $request->input('duration'),
                'status' => $request->input('status'),
                'user_id' => Auth::id()
            ]);
        // insert chapters
        $chapter_ids = $request->input('chapter_ids') !== null ? $request->input('chapter_ids') : [];
        DB::table('card_chapters_xref')->where('card_id', $id)->delete();
        foreach ($chapter_ids as $chapter_id) {
            DB::table('card_chapters_xref')->insert([
                'card_id' => $id,
                'chapter_id' => $chapter_id
            ]);
        }
        // insert exercises
        $card_exercises = DB::table('card_exercises_xref')->where('card_id', $id)->get();
        foreach ($card_exercises as $card_exercise) {
            DB::table('exercises')->whereIn('id', $card_exercise->exercise_id)->delete();
            DB::table('questions')->whereIn('id', $card_exercise->question_id)->delete();
        }
        DB::table('card_exercises_xref')->where('card_id', $id)->delete();
        foreach ($request->input('exercises') as $exercise_index => $exercise) {
            $exercise_id = DB::table('exercises')->insertGetId([
                'content' => $exercise,
                'subject_id' => $request->input('subject_id'),
                'grade_id' => $request->input('grade_id')
            ]);
            $temp_questions = $request->input('questions');
            $temp_questions = isset($temp_questions[$exercise_index]) ? $temp_questions[$exercise_index] : [];
            foreach ($temp_questions as $question_index => $question) {
                $question_id = DB::table('questions')->insertGetId([
                    'description' => $question
                ]);
                DB::table('card_exercises_xref')->insert([
                    'card_id' => $id,
                    'exercise_id' => $exercise_id,
                    'question_id' => $question_id,
                    'question_order' => $question_index + 1
                ]);
            }
        }
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
        // $is_advanced_search = $request->input('advanced_search') !== null ? false : true;
        if ($request->input('search') !== null) {
            $where_clause[] = ['exercises.content', 'like', "%{$request->input('search')}%"];
        }
        if ($request->input('card_type') !== null) {
            $where_clause[] = ['cards.card_type_id', '=', $request->input('card_type')];
        }
        if ($request->input('field') !== null) {
            $where_clause[] = ['cards.field_id', '=', $request->input('field')];
        }
        if ($request->input('grade') !== null) {
            $where_clause[] = ['cards.grade_id', '=', $request->input('grade')];
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
        $subjects = DB::table('subjects')->get();
        $card_types = DB::table('card_types')->get();
        $fields = DB::table('fields')->get();
        $grades = DB::table('grades')->get();
        $years = [];
        for ($i=0; $i < 20; $i++) {
            $years[] = $i + 1990;
        }
        // $parts = [];
        // foreach($cards as $card) {
        //     $temp_exercises = DB::table('card_exercises_xref')->where('card_id', $card->id)->orderBy('question_order', 'asc')->get();
        //     $temp_exercise = DB::table('exercises')->where('id', $temp_exercises[0]->exercise_id)->first();
        //     $parts[$card->id] = ['exercise' => $temp_exercise->content];
        // }
        // return view('search.result')->with(compact('cards', 'parts'));
        return view('search.result')->with(compact('cards', 'subjects', 'card_types', 'fields', 'grades', 'years'));
    }

    public function ajaxHandler(Request $request, $id, $query)
    {
        switch ($query) {
            case 'get-chapters':
                $chapters = DB::table('chapters')->where('subject_id', $request->input('subject_id'))->get();
                $chapters_html = '';
                foreach ($chapters as $chapter) {
                    $chapters_html .= "<option value='$chapter->id' >$chapter->name</option>";
                }
                $json_result = ['status' => 200, 'data' => ['chapters' => $chapters_html]];
                break;

            default:
                $json_result = ['status' => 500, 'data' => ['error' => 'Wrong request']];
                break;
        }
        return response()->json($json_result);
    }
}
