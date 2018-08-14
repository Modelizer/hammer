<?php

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Location;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
            [
                'uuid' => 804040,
                'name' => 'Sonstige Umzugsleistungen'
            ],
            [
                'uuid' => 802030,
                'name' => 'Abtransport, Entsorgung und Entrümpelung'
            ],
            [
                'uuid' => 411070,
                'name' => 'Fensterreinigung'
            ],
            [
                'uuid' => 402020,
                'name' => 'Holzdielen schleifen'
            ],
            [
                'uuid' => 108140,
                'name' => 'Kellersanierung'
            ],
        ]);

        Location::insert([
            ['city' => 'Berlin'],
            ['city' => 'Porta Westfalica'],
            ['city' => 'Lommatzsch'],
            ['city' => 'Hamburg'],
            ['city' => 'Bülzig'],
            ['city' => 'Diesbar-Seußlitz'],
        ]);
    }
}
