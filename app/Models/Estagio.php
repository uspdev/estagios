<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\File;
use App\Models\Empresa;
use App\Models\User;
use App\Models\Aditivo;
use App\Models\Parecerista;
use App\Utils\ReplicadoUtils;
use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;
use Carbon\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Uspdev\Utils\Generic;

class Estagio extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

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
        if (str_contains($value, '/')) {
            $this->attributes['data_inicial'] = implode('-',array_reverse(explode('/',$value)));
        } else {
            $this->attributes['data_inicial'] = $value;
        }
       
    }

    public function getDataFinalAttribute($value) {
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDataFinalAttribute($value) {
        if (str_contains($value, '/')) {
            $this->attributes['data_final'] = implode('-',array_reverse(explode('/',$value)));
        } else {
            $this->attributes['data_final'] = $value;
        }
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
        if($this->numero_usp) {
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
    }

    /* Método para auxiliar na construção de preposição com artigo definido */
    public function getArtigoDefinidoAttribute() {
        if($this->numero_usp){
            if(Pessoa::dump($this->numero_usp)['sexpes'] == "F") return "a";
            return "o";
        }
    }

    /* Método para auxiliar na construção de pronomes possessivos: seu/sua */
    public function getPronomePossessivoAttribute() {
        if($this->numero_usp){
            if(Pessoa::dump($this->numero_usp)['sexpes'] == "F") return "sua";
            return "seu";
        }
    }

    public function getMediaPonderadaAttribute() {
        if($this->numero_usp)
            return ReplicadoUtils::media($this->numero_usp);
    }

    public function getPeriodoAttribute() {
        if($this->numero_usp)
            return ReplicadoUtils::periodo($this->numero_usp);
    }

    public function getSemestreAtualAttribute() {
        if($this->numero_usp)
            return ReplicadoUtils::semestreAtual($this->numero_usp);
    }

    public function getCursoAttribute() {
        if($this->numero_usp)
            $curso = Graduacao::curso($this->numero_usp, 8)['nomhab'];
            if($curso) {
                return Graduacao::curso($this->numero_usp, 8)['nomhab'];
            }else{
                return 'Sem infomação disponível';
            }
    }

    public function getEmailAttribute() {
        if($this->numero_usp)
            return Pessoa::email($this->numero_usp);
    }

    public function getTipoIdentidadeAttribute() {
        if($this->numero_usp)
            return Pessoa::dump($this->numero_usp)['tipdocidf'];
    }

    public function getIdentidadeAttribute() {
        if($this->numero_usp)
            return Pessoa::dump($this->numero_usp)['numdocidf'];
    }

    public function getCpfAttribute() {
        if($this->numero_usp)
            return Pessoa::dump($this->numero_usp)['numcpf'];
    }

    public function getVerificarEstagioAttribute() {
        if($this->numero_usp)
            return Pessoa::verificarEstagioUSP($this->numero_usp);
    }

    public function getHabilitacaoAttribute() {
        if($this->numero_usp) {
            $curso = Graduacao::curso($this->numero_usp,8);
            if($curso) {
                return Graduacao::nomeHabilitacao($curso['codhab'], $curso['codcur']);
            }else{
                return 'Sem infomação disponível';
            }
        } 
    }

    public function getGradeAttribute() {
        if($this->numero_usp)
            return ReplicadoUtils::grade($this->numero_usp);
    }

    public function getDuracaoAttribute() {
        return Generic::formata_periodo($this->data_inicial, $this->data_final);
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
            'analise_alteracao_parecerista' => [
                'name' => "Aditivo de Alterações - Análise do Parecerista",
                'optional' => 'Docente'
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

    public function getPareceristaNomeAttribute() {
        if($this->numparecerista) {
            return Pessoa::nomeCompleto($this->numparecerista);
        }
    }

    public function getPareceristaEmailAttribute() {
        if($this->numparecerista)
            return Pessoa::email($this->numparecerista);
    }
}
