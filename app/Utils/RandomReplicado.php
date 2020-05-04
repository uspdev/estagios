<?php

namespace App\Utils;

class RandomReplicado
{
    public static function docente() {
        do {
          $silaba = self::silaba();
          $query = "SELECT codpes FROM LOCALIZAPESSOA 
                    WHERE tipvinext LIKE 'Docente' 
                    AND sitatl = 'A'
                    AND codundclg = 8
                    AND nompes LIKE '%{$silaba}%'";
            $codpes = \Uspdev\Replicado\DB::fetch($query);
        } while(empty($codpes));
        return $codpes['codpes'];
    }

    public static function graduacao() {
        do {
          $silaba = self::silaba();
          $query = "SELECT codpes FROM LOCALIZAPESSOA 
                    WHERE tipvin = 'ALUNOGR'
                    AND sitatl = 'A'
                    AND codundclg = 8
                    AND nompes LIKE '%{$silaba}%'";
            $codpes = \Uspdev\Replicado\DB::fetch($query);
        } while(empty($codpes));
        return $codpes['codpes'];
    }

    public static function silaba() {
        $consoantes = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'];
        $vogais = ['a', 'e', 'i', 'o', 'u'];
        return $consoantes[array_rand($consoantes)] . $vogais[array_rand($vogais)];
    }
}

