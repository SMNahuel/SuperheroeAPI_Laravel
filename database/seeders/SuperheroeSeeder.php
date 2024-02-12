<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Superheroe;
use Illuminate\Support\Facades\Storage;

class SuperheroeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 
        *   Leemos los superheroes desde el JSON en api\storage\app\json\superheroe.json
        */
        $json = Storage::disk('local')->get('/json/superheroe.json');

        /*
        *   Formateamos los datos
        */
        $superheroes = json_decode($json);

        /* 
        *   Recorremos e insertamos los superheroe 
        */
        foreach ($superheroes as $key => $value) {
            Superheroe::create([
                "id" => $value->id,
                "name" => $value->name,
                "slug" => $value->slug,
                "intelligence" => $value->intelligence,
                "strength" => $value->strength,
                "speed" => $value->speed,
                "durability" => $value->durability,
                "power" => $value->power,
                "combat" => $value->combat,
                "imagexs" => $value->imagexs,
                "imagesm" => $value->imagesm,
                "imagemd" => $value->imagemd,
                "imagelg" => $value->imagelg,
            ]);
        }
    }
}
