<?php

namespace Tests\Feature\API\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketsTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_example()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_create_new_ticket()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->post('api/v1/tickets', [
            'customer_name' => 'Gihan test',
            'email' => 'gihantest@gmail.com',
            'phone' => '1234567',
            'description' => 'There is somthing... ',
        ]);
        
        $response->assertStatus(200);

        $response->assertJson([
            'data' => [
                'email' => 'gihantest@gmail.com',
            ]
            ]);


    }
}