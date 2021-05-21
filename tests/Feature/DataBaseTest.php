<?php

namespace Tests\Feature;
use App\Models\EventsList; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class DataBaseTest extends TestCase
{   
    /**
     * Serve a refreshare il database prima di ogni test in modo che i
     * test precedenti non interferiscano con i successivi
     */
    use RefreshDatabase;
    /**
     * Testa la ricerca per regione
     *
     * @return void
     */
    public function test_regione1()
    {
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Marche','Marche','Marche','Marche'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered(null, 'Marche');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->regione);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa la ricerca di un evento per id
     * 
     * @return void 
     */
    public function test_id() { 
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Marche','Marche','Marche','Marche'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered(null, 'Marche');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->regione);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }    
    /**
     * Testa la ricerca per regione
     * 
     * @return void 
     */
    public function test_regione2() {
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Lazio', 'Lazio', 'Lazio'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered(null, 'Lazio');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->regione);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa la ricerca per data
     * 
     * @return void 
     */
    public function test_data1() {
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['2021-04-22', '2021-04-23', '2021-04-24', '2021-04-20'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered('2021-04');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->data);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa la ricerca per data
     * 
     * @return void 
     */
    public function test_data2(){
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['2021-03-25', '2021-03-25', '2021-03-25'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered('2021-03');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->data);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa la ricerca per organizzatore
     * 
     * @return void
     */
    public function test_organizzatore(){
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Acme', 'Acme', 'Acme', 'Acme', 'Acme'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered(null, null, 'Acme');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->nomeorganizzatore);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa la ricerca per descrizione
     * 
     * @return void 
     */
    public function test_descrizione(){
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Descrizione dell\'evento di prova numero: 2'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered(null, null, null, 'numero: 2');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->descrizione);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa la ricerca con più parametri contemporaneamente
     * 
     * @return void 
     */
    public function test_multiplo(){
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['Evento di prova 1', '2021-04-23'];
        $QueryResult = [];
        $resultsList = $eventlist->getEventsFiltered('2021-04', 'Marche', 'Acme', 'numero: 1');
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->nome, $result->data);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
    }
    
    /**
     * Testa gli eventi recenti
     */
    public function test_recenti() {
        $eventlist = new EventsList;
        $this->seed();
        $QueryAssert = ['2021-07-20', '2021-07-20','2021-07-22', '2021-07-23', '2021-07-24', '2021-07-25', '2021-07-25', '2021-07-25'];
        $QueryResult = [];
        $resultsList = $eventlist->getNearEvents();
        foreach ($resultsList as $result){
            array_push($QueryResult, $result->data);
            Log::debug($result->nome);
        }
        $this->assertEquals($QueryAssert, $QueryResult );
        
    }
    
    
}
