<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Figurinha;
use App\Models\Questao;
use App\Models\Resposta;

class FigurinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // excluindo valores da sessao de armazenamento do id da figurinha
        if ($request->session()->has('Figurinha_id')) {
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('figurinhas.edit',['figurinha' => Figurinha::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $novaFigurinha = [
            "nome" => $request->nome,
            "desc" => $request->desc,
            "imgOn" => figurinha::uploadImagem($request)
        ];

        if (!isset($request->imgOn)){
            $novaFigurinha['imgOn'] = Figurinha::findOrFail($id)->imgOn;
        }

        Figurinha::findOrFail($id)->update($novaFigurinha);
        return redirect()->route('figurinhas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Resposta::where(['figurinha_id' => $id])->delete();
        Questao::where(['figurinha_id' => $id])->delete();
        Figurinha::findOrFail($id)->delete();
        return redirect()->route('figurinhas.index');
    }

    public function dashboard()
    {
        return view("figurinhas.dashboard",['figurinhas' => Figurinha::all()]);
    }

    public function personagens()
    {
        return view("figurinhas.personagens",['figurinhas' => Figurinha::all()]);
    }
}
