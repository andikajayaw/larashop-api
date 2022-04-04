<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $api_key = "91dfcbd682c5763857e78074d239d1b6";
        $url_province = "https://api.rajaongkir.com/starter/province?key={$api_key}";
        $json_str = file_get_contents($url_province);
        $json_obj = json_decode($json_str);

        foreach ($json_obj->rajaongkir->results as $key => $value) {
            $provinces[] = [
                'id' => $value->province_id,
                'province' => $value->province,
            ];
        }
        DB::table('provinces')->insert($provinces);
    }
}
