<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommerciauxFactory extends Factory
{
    /**
     * Changer nom et prenom, il y'a des propriété dans faker pour prendre seulement le prenom et nom, ici je rentre 2 nom a chaque fois.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'ville' => $this->faker->city(),
            'nbre_commande' => $this->faker->randomDigit(),
        ];
    }
}
