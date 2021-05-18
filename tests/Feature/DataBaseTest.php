<?php

namespace Tests\Feature;
use App\Models\EventsList; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DataBaseTest extends TestCase
{   
    /**
     * Serve a refreshare il database prima di ogni test in modo che i
     * test precedenti non interferiscano con i successivi
     */
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Marche','Marche'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered(null, 'Marche');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->regione);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
}
