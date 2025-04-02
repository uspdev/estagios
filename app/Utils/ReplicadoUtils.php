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

    public static function periodo($codpes){
        $query = "SELECT H.perhab FROM VINCULOPESSOAUSP V
        INNER JOIN CURSOGR C ON (V.codcurgrd = C.codcur)
        INNER JOIN HABILITACAOGR H ON (H.codhab = V.codhab)
        WHERE V.codpes = convert(int, :codpes) AND V.tipvin = 'ALUNOGR'
        AND V.codcurgrd = H.codcur AND V.codhab = H.codhab";

        $param = [
            'codpes' => $codpes,
        ];

        $result = DBreplicado::fetch($query, $param);

        return $result['perhab'];
    }

}
