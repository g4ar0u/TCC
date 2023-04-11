<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizz;
use App\Models\Figurinha;

class QuizzController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quizzes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Quizz $quizz)
    {
        $quizz->fill($request->all());
        $quizz->figurinha_id= $request->session()->get('Figurinha_id');
        $quizz->save();

        return redirect()->route('quizzes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $figurinha = Figurinha::findOrFail($id);
        $quizzes = Quizz::where(["figurinha_id"=>$id])->get();
        return view('quizzes.show', compact('figurinha','quizzes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
