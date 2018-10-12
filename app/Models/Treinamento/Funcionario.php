<?php

namespace App\Models\Treinamento;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Funcionario extends Model
{
    protected $fillable = [
    	'nome_funcionario', 
    	'matricula',
        'instrutor', 
        'situacao',
    	'cargos_id',
    	'cetors_id',
    	'departamentos_id',
        
    ];     

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function cargo(){
    	return $this->belongsTo(\App\Models\Treinamento\Cargo::class, 'cargos_id', 'id');
    }
    public function departamento(){
    	return $this->belongsTo(\App\Models\Treinamento\Departamento::class, 'departamentos_id', 'id');
    }
    public function cetor(){
    	return $this->belongsTo(\App\Models\Treinamento\Cetor::class, 'cetors_id', 'id');
    }
    

    
}

