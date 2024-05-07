<?php

namespace App\Service;

use App\Models\Area;

class AreaService
{
    public function handleArea(array $areaData)
    {
        Area::where('estagios_id', $areaData['estagio_id'])->delete();

        $area_estagio = $areaData['area_estagio'];

        if (array_key_exists('outra_area', $areaData)) {
            array_push($area_estagio, $areaData['outra_area']);
        }

        $area_estagio = array_diff($area_estagio, ['Outra']);

        foreach($area_estagio as $area){
            Area::create([
                'area' => $area,
                'estagios_id' => $areaData['estagio_id'],
            ]);
        }

        return NULL;
    }

}
