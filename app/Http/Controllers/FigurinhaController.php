<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figurinha;

class FigurinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(request('finalizar')) {
            $request->session()->pull('Figurinha_id', null);
        }
        return view('figurinhas.index', ['figurinhas'=>Figurinha::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('figurinhas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Figurinha $figurinha)
    {
        $figurinha->fill($request->all());
        //chama-se o obj figurinha. Preenche o obj com a variavel de request com os parametros da outra pagina (Models E Figurinha)
        $figurinha->imgOn=figurinha::uploadImagem($request);
        $figurinha->save();
        $request->session()->put('Figurinha_id', $figurinha->id);
        return redirect()->route('questoes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
