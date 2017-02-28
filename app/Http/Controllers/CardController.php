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
        return view('cards.cards_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.cards_form');
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
        $card = DB::table('cards')->where('cards.id', $id)
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->select('cards.*',
                'card_types.name as card_type_name',
                'users.username as user_username')
            ->first();
        $exercises = DB::table('card_exercises')
            ->where('card_id', $card->id)
            ->join('exercises', 'exercises.id', '=', 'card_exercises.exercise_id')
            ->select('exercises.*')
            ->get();
        // $exercises = DB::table('exercises')->where('id', $temp_exercises->exercise_id)->first();
        $comments_number = DB::table('comments')->where('card_id', $id)->count();

        return view('cards.cards_show')->with(compact('card', 'comments_number', 'exercises'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $card = DB::table('cards')->where('cards.id', $id)
            ->join('users', 'users.id', '=', 'cards.user_id')
            ->join('card_types', 'card_types.id', '=', 'cards.card_type_id')
            ->select('cards.*',
                'card_types.name as category',
                'users.username as author')
            ->first();
        $comments_number = DB::table('comments')->where('card_id', $id)->count();

        return view('cards.cards_form')->with(compact(
            'id', 'card', 'comments_number'
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
        DB::table('cards')->where('id', $id)->delete();
        return response()->json(['message' => 'Success!','state' => 200]);
    }
}
