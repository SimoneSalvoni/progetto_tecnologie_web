<?php

//namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            DB::table('faqs')->insert([
               'domanda' => 'Ho acquistato un biglietto di troppo, è possibile chiedere un rimborso?',
                'risposta' => 'Sì, tuttavia ti invitiamo a contattarci tramite mail per questo tipo di procedura'
            ]);
            
            DB::table('faqs')->insert([
               'domanda' => 'Vorrei accorpare più ordini, è possibile?',
                'risposta' => 'No, il nostro sistema non permette questo tipo di operazione'
            ]);
            
            DB::table('faqs')->insert([
               'domanda' => 'Quali sono i costi del servizio?',
                'risposta' => 'Non ci sono costi di servizio per i clienti in quanto R3S offre solamente biglietti digitali'
            ]);
            
            DB::table('faqs')->insert([
               'domanda' => 'Posso usare il Bonus Cultura riservato ai diciottenni sul sito R3S?',
                'risposta' => 'No, in quanto il nostro esercizio ha ancora meno di un anno di attività'
            ]);
            
            DB::table('faqs')->insert([
               'domanda' => 'Come procedo per registrarmi al sito?',
                'risposta' => 'Da qualsiasi pagina del sito basterà cliccare in alto a destra su "Accedi", dopodiché cliccare "Registrati", subito sotto il tasto di accesso e seguire la procedura'
            ]);
            
            DB::table('faqs')->insert([
               'domanda' => 'Quali possibili modalità di pagamento ci sono?',
                'risposta' => 'Ad oggi i metodi di pagamento consentiti sono PostePay, Paypal e conto bancario'
            ]);
            
            DB::table('faqs')->insert([
               'domanda' => 'Come posso raggiungere il servizio clienti?',
                'risposta' => 'Tramite mail al seguente indirizzo: servizioclienti@r3stickets.it'
            ]);
        
    }
}
