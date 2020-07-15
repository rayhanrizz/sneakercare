<?php

use Illuminate\Database\Seeder;
use App\Fasilitas;
class FasilitasSeeder extends Seeder
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
              'nama_fasilitas' => 'Cleaning Kit Lengkap', 
              'gambar' => 'kit.jpg'
          	],

            [  
              'nama_fasilitas' => 'Free Shoes Bag', 
              'gambar' => 'bag.jpg'
          	],

            [  
              'nama_fasilitas' => 'Pick Up Delivery',
              'gambar' => 'pick.jpg'
          	]
        ];

        foreach ($listbrg as $brg) {
            Fasilitas::create($brg);
        }
    }
}
