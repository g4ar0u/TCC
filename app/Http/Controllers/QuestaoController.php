<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figurinha;
use App\Models\Questao;
use App\Models\Resposta;

class QuestaoController extends Controller
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
        return view('questoes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Questao $questao, Resposta $Resposta)
    {
        $questao->fill($request->all());
        $questao->figurinha_id= $request->session()->get('Figurinha_id');
        $questao->save();

        // criando as respostas erradas
        for ($i = 0; $i < count($request->resposta); $i++) {
           $Resposta->create([
            'texto' => $request->resposta[$i],
            'correta' => 0,
            'figurinha_id' => $questao->figurinha_id,
            'questao_id' => $questao->id
           ]);
        }

        // criando a resposta certa
        $Resposta->create([
            'texto' => $request->respostaCerta,
            'correta' => 1,
            'figurinha_id' => $questao->figurinha_id,
            'questao_id' => $questao->id
        ]);

        return redirect()->route('questoes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $figurinha = Figurinha::findOrFail($id);
        $questoes = Questao::where(["figurinha_id"=>$id])->get();
        $respostas = Resposta::where(['figurinha_id'=>$id])->get();
        return view('questoes.show', compact('figurinha','questoes','respostas'));
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

    public function validateQuizz(Request $request)
    {
        $id = $request->figurinha_id;
        Figurinha::findOrFail($id)->update(['imgAtiva' => 's']);
        return redirect()->route('figurinhas.index');
    }
}
