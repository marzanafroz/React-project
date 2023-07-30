<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Fake;

class CatSeeder extends Seeder
{
    public function run()
    {
        $faker = Fake::create();
        for ($i=0; $i < 50; $i++) { 
            # code...
        
        $data = [
            'name' => $faker->name(),
            'image'    => $faker->name().".jpg",
        ];
        $subcat = [
            'name'=>$faker->name(),
            'category_id'=>rand(1,10),
        ];

        // Using Query Builder
        $this->db->table('categories')->insert($data);
        $this->db->table('subcategories')->insert($subcat);
    }
    }
}
