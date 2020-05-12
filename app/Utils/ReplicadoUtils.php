<?php

namespace App\Utils;
use Uspdev\Replicado\DB as DBreplicado;

class ReplicadoUtils {

    /* Este método retorna o endereço... */
    /* Ele é transitório, pois foi enviaod um issue... */
    /* https://github.com/uspdev/replicado/issues/226  */
    
    public static function endereco($codpes) {
        $data = DBreplicado::fetch('SELECT codpes, nompes from PESSOA where codpes=5385361');
        return $data['codpes'] . " - " . $data['nompes'];
    }

}