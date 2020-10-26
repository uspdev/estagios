<?php

namespace App\Utils;
use Uspdev\Replicado\DB as DBreplicado;
use Uspdev\Replicado\Uteis;

class ReplicadoUtils {

     /**
     * Retorna o semestre atual que o aluno está cursando
     * Método transitório, pois ainda não foi criado issue...
     * @param type $codpes
     * @return int
     */
    public static function semestreAtual($codpes) {
        $query = "SELECT COUNT(s.anosem) FROM SITALUNOATIVOGR s 
                    WHERE codpes = convert(int,:codpes)";
        $param = [
            'codpes' => $codpes,
        ];
        $result = DBreplicado::fetch($query, $param);
        foreach ($result as $row)
        {
            print_r($row);
        }
        return false;
    }

    public static function grade($codpes){
        $query = "SELECT DISTINCT h.coddis, t.codtur, t.diasmnocp from HISTESCOLARGR h 
        INNER JOIN OCUPTURMA t ON h.codtur = t.codtur
        WHERE h.codpes = convert(int,:codpes) and h.rstfim = NULL";
        $param = [
            'codpes' => $codpes,
        ];
        return DBreplicado::fetchAll($query, $param);
    }

    public static function media($codpes){
        $query = "SELECT notfim from HISTESCOLARGR where codpes = convert(int,:codpes) AND rstfim != NULL;";
        $param = [
            'codpes' => $codpes,
        ];
        $notas = DBreplicado::fetchAll($query, $param);
        // Calcular a média  e retorná-la
    }
}