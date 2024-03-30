<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use SplFileObject;

class ShopsTableSeeder extends Seeder
{
    public function run()
    {
        $file = new SplFileObject(storage_path('seeders/shop.data.csv'));
        $file->setFlags(SplFileObject::READ_CSV);
        foreach ($file as $row) {
            if (!is_null($row[0])) {
                DB::table('shops')->insert([
                    'shop_name' => $row[0],
                    'region' => $row[1],
                    'genre' => $row[2],
                    'shop_overview' => $row[3],
                    'image_url' => $row[4],
                ]);
            }
        }
    }
}