<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Office;
use Database\Factories;
use Carbon\Carbon;




class OfficeTest extends TestCase
{
    use RefreshDatabase;
    
    //testing post function
    public function testsOfficesAreCreatedCorrectly()
    {
        $payload = [
            'name' => 'Lorem',
            'address' => 'Ipsum',
        ];
        $lastrow = Office::all()->last();
        $this->json('POST','api/office', $payload)
            ->assertStatus(201)
            ->assertJson(['id' => $lastrow->id+1, 'name' => 'Lorem', 'address' => 'Ipsum']);
    }
    
    //testing update function
    public function testsOfficesAreUpdatedCorrectly()
    {
        $office = Office::factory()->create([
            'name' => 'name 1',
            'address' => 'address 1',
            
        ]);
        $payload = [
            'name' => 'Lorem',
            'address' => 'Ipsum',
            
        ];
        

        $response = $this->json('PUT', '/api/office/' . $office->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'id' => $office->id, 
                'name' => 'Lorem', 
                'address' => 'Ipsum',
                
    ]);
    }
    
    //testing delete function
    public function testsOfficesAreDeletedCorrectly()
    { 
        $office = Office::factory()->create([
            'name' => 'name 1',
            'address' => 'address 1',
        ]);

        $this->json('DELETE', '/api/office/' . $office->id, [])
            ->assertStatus(204);
    }

    //testing list function
    public function testOfficesAreListedCorrectly()
    {
        $office = Office::factory()->create([
            'name' => 'name 1',
            'address' => 'address 1'
        ]);
        
        $response = $this->json('GET', '/api/office/',[])
            ->assertStatus(200)
            ->assertJsonFragment(
                    ['name' => 'name 1','address' => 'address 1']
            )
            ->assertJsonStructure([
                '*' => ['id', 'name', 'address'],
            ])
            ;
    }


}