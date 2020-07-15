<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductSeeder extends Seeder
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
              'nama_product' => 'Canvas Fast Clean', 
              'harga' => '25000'
          	],

            [  
              'nama_product' => 'Suede Fast Clean', 
              'harga' => '30000'
          	],

            [  
              'nama_product' => 'Leather Fast Clean', 
              'harga' => '35000'
          	],
          	[  
              'nama_product' => 'Canvas Deep Clean', 
              'harga' => '45000'
          	],
          	[  
              'nama_product' => 'Suede Deep Clean', 
              'harga' => '50000'
          	],
          	[  
              'nama_product' => 'Leather Deep Clean', 
              'harga' => '55000'
          	]
        ];

        foreach ($listbrg as $brg) {
            Product::create($brg);
        }
    }
}
