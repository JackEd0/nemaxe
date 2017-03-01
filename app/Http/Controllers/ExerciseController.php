<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = DB::table('subjects')->get();
        $grades = DB::table('grades')->get();
        $exercises = DB::table('exercises')
            ->join('subjects', 'subjects.id', '=', 'exercises.subject_id')
            ->join('grades', 'grades.id', '=', 'exercises.grade_id')
            ->join('users', 'users.id', '=', 'exercises.user_id')
            ->select(
                'exercises.*',
                'subjects.name as subject_name',
                'grades.name as grade_name',
                'users.username as user_username'
            )
            ->get();

        return view('exercises.exercises_index')->with(compact('subjects', 'grades', 'exercises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exercises.exercises_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('exercises')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'subject_id' => $request->input('subject_id'),
            'grade_id' => $request->input('grade_id'),
            'duration' => $request->input('duration'),
            'status' => $request->input('status')
        ]);

        return redirect('/exercises');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('/exercises');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subjects = DB::table('subjects')->get();
        $grades = DB::table('grades')->get();
        $exercise = DB::table('exercises')
            ->where('exercises.id', $id)
            ->first();

        return view('exercises.exercises_form')->with(compact(
            'id', 'subjects', 'grades', 'exercise'
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
        DB::table('exercises')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'subject_id' => $request->input('subject_id'),
                'grade_id' => $request->input('grade_id'),
                'duration' => $request->input('duration'),
                'status' => $request->input('status')
            ]);

        return redirect('/exercises');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('exercises')->where('id', $id)->delete();
        return response()->json(['message' => 'Success!','state' => 200]);
    }
}
