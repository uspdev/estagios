<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;
use App\Models\File;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Aditivo;
use App\Models\Parecerista;
use App\Utils\ReplicadoUtils;
use Uspdev\Replicado\Pessoa;

class Estagio extends Model
{
    use HasFactory;
    use WorkflowTrait;

    protected $guarded = ['id'];

    public function arquivos(){
        return $this->hasMany(File::class);
    }

    public function avaliacao_empresaOptions(){
        return [
            'Positivo',
            'Negativo'
        ];
    }

    public function especifiquevtOptions(){
        return [
            'Mensal',
            'Diário'
        ];
    }

    public function tipobolsaOptions(){
        return [
            'Mensal',
            'Por Hora'
        ];
    }

    public function atividadespertinentesOptions(){
        return [
            'Sim',
            'Não',
            'Parcialmente'
        ];
    }
    
    public function buscastatusOptions(){
        return [
            'Sim',
            'Não',
            'Parcialmente'
        ];
    }  

    public function pandemiahomeofficeOptions(){
        return [
            'Sim',
            'Não'
        ];
    }


    public function tipodeferimentoOptions(){
        return [
            'Deferido',
            'Deferido com Restrição',
            'Indeferido'
        ];
    }

    public function condicaodeferimentoOptions(){
        return [
            'Sim',
            'Não'
        ];
    }
    
    public function getDataInicialAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataInicialAttribute($value) {
       $this->attributes['data_inicial'] = implode('-',array_reverse(explode('/',$value)));
    }

    public function getDataFinalAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataFinalAttribute($value) {
       $this->attributes['data_final'] = implode('-',array_reverse(explode('/',$value)));
    }

    public function getRescisaoDataAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setRescisaoDataAttribute($value) {
       $this->attributes['rescisao_data'] = implode('-',array_reverse(explode('/',$value)));
    }

    public function setCnpjAttribute($value){
        $this->attributes['cnpj'] = preg_replace("/[^0-9]/", "", $value);  
    }

    public function getEnderecoAttribute() {
        $endereco = Pessoa::obterEndereco($this->numero_usp);
            
        // Formata endereço
        return [
            $endereco['nomtiplgr'],
            $endereco['epflgr'] . ",",
            $endereco['numlgr'] . " ",
            $endereco['cpllgr'] . " - ",
            $endereco['nombro'] . " - ",
            $endereco['cidloc'] . " - ",
            $endereco['sglest'] . " - ",
            "CEP: " . $endereco['codendptl'],
        ];
    }

    public function getNomeAttribute() {
        if($this->numero_usp)
            return Pessoa::nomeCompleto($this->numero_usp);
    }

    public function getEmailAttribute() {
        if($this->numero_usp)
            return Pessoa::email($this->numero_usp);
    }

    public function getStatus(){
        $status = [
            'em_elaboracao' => [
                'name' => "Em Elaboração",
                'optional' => 'Empresa'
            ],
            'em_analise_tecnica' => [
                'name' => "Análise Técnica",
                'optional' => 'Setor de Graduação'
            ],

            'assinatura' => [
                'name' => "Assinatura",
                'optional' => 'Setor de Graduação'
            ],

            'em_analise_academica' => [
                'name' => "Parecer de Mérito",
                'optional' => 'Docente'
            ],
            'concluido' => [
                'name' => "Concluído",
                'optional' => 'Docente'
            ],
            'em_alteracao' => [
                'name' => "Aditivo de Alterações",
                'optional' => 'Empresa'
            ],
            'rescisao' => [
                'name' => "Rescisão",
                'optional' => 'Empresa'
            ],
            'cancelado' => [
                'name' => "Cancelado",
                'optional' => 'Estágio Cancelado'
            ],
        ];
        return $status;
    }

    public function analise_academica_user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function analise_tecnica_user()
    {
        return $this->belongsTo(User::class);
    }

    public function mediaponderada() {
        return ReplicadoUtils::media($this->numero_usp);
    }

    public function periodo() {
        return ReplicadoUtils::periodo($this->numero_usp);
    }

    public function aditivos(){
        return $this->hasMany(Aditivo::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'cnpj','cnpj');
    }

    public function parecerista()
    {
        return $this->belongsTo(Parecerista::class,'numparecerista','numero_usp');
    }
}
