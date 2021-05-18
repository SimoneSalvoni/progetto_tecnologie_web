<?php

namespace Tests\Feature;
use \App\Models\EventsList; 
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
    protected $eventlist;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->$eventlist = new EventsList;
        $this->seed();
        $firstQueryAssert = 'Marche';
        $resultsList = $eventList->getEventsFiltered(null, 'Marche');
        foreach ($resultsList as $result){
            $this->assertEquals($firstQueryAssert, $result->regione );
        }
    }
}
