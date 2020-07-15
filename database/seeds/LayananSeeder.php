<?php

use Illuminate\Database\Seeder;
use App\Layanan;
class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $listbrg = [
            [  
              'nama_layanan' => 'Fast Clean', 
              'gambar' => 'fast.jpg'
          	],

            [  
              'nama_layanan' => 'Deep Clean', 
              'gambar' => 'deep.jpg'
          	]
        ];

        foreach ($listbrg as $brg) {
            Layanan::create($brg);
        }
    }
}
