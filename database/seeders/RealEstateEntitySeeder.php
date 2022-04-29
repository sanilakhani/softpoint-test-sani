<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RealEstateEntity;

class RealEstateEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 0; $x <= 10; $x++) {
            RealEstateEntity::create([
                'name' => 'Test Name- '.$x,
                'real_state_type' => 'house',
                'street' => 'Street - '.$x,
                'external_number' => 'External - '.$x,
                'Internal_number' => 'Internal - '.$x,
                'neighborhood' => 'Neighborhood - '.$x,
                'city' => 'Rajkot',
                'country' => 'In',
                'rooms' => $x,
                'bathrooms' => $x, 
                'comments' => "Comment - ".$x,
            ]);
        }
    }
}
