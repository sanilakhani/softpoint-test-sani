<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\RealEstateEntity;

class RealEstateEntityTest extends TestCase
{
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

     
    public function test_list_api()
    {
        $url = "http://127.0.0.1:8000/api/realestateentity/";
        $response = $this->getJson($url);
        return $response->assertStatus(200);
    }

    public function test_update_api()
    {
        $realEstate = RealEstateEntity::select()->first();

        if(!empty($realEstate)){
            $url = "http://127.0.0.1:8000/api/realestateentity/update/".$realEstate->id;
            $Params = [
                "name" => "sani2",
                "real_state_type" => "house",
                "street" => "Movadi1",
                "external_number" => "A1a1-a2A21",
                "Internal_number" => "B1b1-B2B21",
                "neighborhood" => "naibour hood1",
                "city" => "rajkot1",
                "country" => "US",
                "rooms" => 11,
                "bathrooms" => "",
                "comments" => "test comment1"
            ];
            $response = $this->putJson($url,$Params);
        }
        return $response->assertStatus(200);
    }
}
