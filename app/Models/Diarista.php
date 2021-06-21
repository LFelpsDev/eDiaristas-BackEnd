<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    // Define os campos que pode ser gravados
    protected $fillable = ['nome_completo',  'cpf', 'email', 'telefone', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'estado', 'cep', 'codigo_ibge', 'foto_usuario'];
    // define os campos que serão usados na exebição 
    protected $visible = ['nome_completo', 'cidade', 'foto_usuario', 'reputacao'];
    // adiciona campos na serialização 
    protected $appends = ['reputacao'];
    // monta a url da imagem
    public function getFotoUsuarioAttribute(string $valor)
    {   
        return config('app.url') . '/' . $valor;
    }
    // retorna a reputação randomica
    public function getReputacaoAttribute($valor)
    {
        return mt_rand(1, 5);
    }
    /*
        Busca diaristas por codigo ibge

        @param  integer $codigoIbge
        @return void
    */
    static public function buscaPorCodigoIbge(int $codigoIbge)
    {
        return Diarista::where('codigo_ibge', $codigoIbge)->limit(6)->get();
    }

    /*
        Returna a quantidade de diaristas

        @param  intenger $codigoIbge
        @return void
    */

    static public function quantidadePorCodigoIbge(int $codigoIbge)
    {
        $quantidade = Diarista::where('codigo_ibge', $codigoIbge)->count();

        return $quantidade > 6 ? $quantidade - 6 : 0;
    }
}
