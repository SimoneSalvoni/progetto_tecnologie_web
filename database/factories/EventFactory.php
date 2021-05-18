<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'=>$this->faker->unique->title(),
            'descrizione'=>$this->faker->text(),
            'urlluogo'=> $this->faker->imageUrl(),
            'regione'=> 'Marche',
            'provincia'=>'AN',
            'indirizzo'=>'via Prova',
            'numciv'=>'112',
            'data'=>$this->faker->date('Y-m-d'),
            'immagine'=>$this->faker->imageUrl(),
            'costo'=>$this->faker->randomFloat(),
            'sconto'=>null,
            'giornisconto'=>null,
            'bigliettivenduti'=> $this->faker->randomDigit(),
            'bigliettitotali' =>$this->faker->numberBetween(15, 40),
            'incassototale'=> $this->faker->randomFloat(),
            'parteciperò'=> $this->faker->randomNumber(),
            'nomeorganizzatore'=> $this->faker->title()
            
            
        ];
    }
}
