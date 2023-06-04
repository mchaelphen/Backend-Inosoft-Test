<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class product extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/vehicle');
        $response = $this->get('/stock');
        $response = $this->get('/stock?numOfTires=2');
        $response = $this->get('/stocknumOfTires=4');
        
        $response->assertStatus(200);
    }
}
