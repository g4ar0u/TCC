<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figurinha;
use App\Models\Questao;
use App\Models\Resposta;

class QuestaoController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (request("addQuestao")) {
            $request->session()->put('Figurinha_id', request("addQuestao"));
        }
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
        $questao = Questao::findOrFail($id);
        $respostas = Resposta::where(['questao_id' => $questao->id])->get();
        return view('questoes.edit',compact('questao','respostas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $respostas = Resposta::where(['questao_id' => $id])->get();
       
        foreach ($respostas as $key => $value) {
            
            $novaResposta = [
                'questao_id' => $value->questao_id,
                'figurinha_id' => $value->figurinha_id,
                'correta' => $value->correta,
                'texto' => $request->resposta[$key]
            ];
            
            Resposta::findOrFail($value->id)->update($novaResposta);    
        }

        return redirect()->route('figurinhas.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Resposta::where(['questao_id' => $id])->delete();
        Questao::findOrFail($id)->delete();
        return redirect()->route('figurinhas.index');
    }

    public function validateQuizz(Request $request)
    {
        $id = $request->figurinha_id;
        Figurinha::findOrFail($id)->update(['imgAtiva' => 's']);
        return redirect()->route('figurinhas.index');
    }

    public function dashboard(string $id)
    {
        $questoes = Questao::where(['figurinha_id' => $id])->get();
        $figurinha = Figurinha::findOrFail($id);
        return view('questoes.dashboard',compact('questoes','figurinha'));
    }
}
