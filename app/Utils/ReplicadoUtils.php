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
        $current = date("Y") . (date("m") > 6? 2:1);

        $query =  "SELECT h.coddis, h.codtur, o.diasmnocp, p.horent, p.horsai FROM HISTESCOLARGR h 
        INNER JOIN OCUPTURMA o ON (h.coddis = o.coddis AND h.codtur = o.codtur)
        INNER JOIN PERIODOHORARIO p ON (o.codperhor = p.codperhor)
        where h.codpes = convert(int,:codpes) and h.codtur LIKE '%{$current}%' ORDER BY o.diasmnocp";
        $param = [
            'codpes' => $codpes,
        ];
        return DBreplicado::fetchAll($query, $param);
    }

    public static function media($codpes){
        $query = "SELECT medpon FROM CLASSIFICACAOPROGRAMA where codpes = convert(int,:codpes) ORDER BY timestamp DESC";

        $param = [
            'codpes' => $codpes,
        ];
        $result = DBreplicado::fetch($query, $param);
        if($result) return $result['medpon'];
        else return null;
    }

    public static function periodo($codpes){
        $query = "SELECT perhab FROM SITALUNOATIVOGR WHERE codpes = convert(int,:codpes) ORDER BY dtager DESC";
        $param = [
            'codpes' => $codpes,
        ];
        $result = DBreplicado::fetch($query, $param);
        return $result['perhab'];
    } 

}
