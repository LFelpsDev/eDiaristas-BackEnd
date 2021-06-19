<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use Illuminate\Http\Request;

class DiaristasController extends Controller
{   
    /**
     * Lista as Diaristas.
     *
     * @return void
     */
    public function index()
    { 
        $diaristas = Diarista::get();

        return view('index', [
            'diaristas' => $diaristas
        ]);
    }

    /*
        Mostra o formulario de criação
    */
    public function create()
    {
        return view('create');
    }

    /*
        Cria uma Diarista NO Banco de dados
    */
    public function store(Request $request)
    {
        $dados = $request->except('_token');
        $dados['foto_usuario'] = $request->foto_usuario->store('public');

        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['-','(',')', ' ' ],'', $dados['telefone']);
        $dados['codigo_ibge'] = str_replace('-', '', $dados['codigo_ibge']);

        Diarista::create($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * 
     * Mostra o formulario de edição populado
     * 
     */ 
    public function edit(int $id)
    {
       $diarista =  Diarista::findOrFail($id);

       return view('edit', [
           'diarista' => $diarista
       ]);
    }

    /**
     * 
     * Atualiza uma diarista no banco de dados
     * 
     */ 
    public function update(int $id, Request $request)
    {
        $diarista =  Diarista::findOrFail($id);

        $dados = $request->except(['_token', '_method']);

        if ($request->hasFile('foto_usuario')) {
            $dados['foto_usuario'] = $request->foto_usuario->store('public');
        }

        $diarista->update($dados);

        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['-','(',')', ' ' ],'', $dados['telefone']);
        $dados['codigo_ibge'] = str_replace('-', '', $dados['codigo_ibge']);

        return redirect()->route('diaristas.index');
    }

    /*

        Deleta uma diarista do banco de dados

    */
    public function destroy(int $id)
    {
        $diarista = Diarista::findOrFail($id);

        $diarista->delete();

        return redirect()->route('diaristas.index');
    }

}
