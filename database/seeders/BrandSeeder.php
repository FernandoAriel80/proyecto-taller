<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Toyota',
                'description' => 'Fabricante japonés conocido por su fiabilidad y tecnología avanzada.'
            ],
            [
                'name' => 'Volkswagen',
                'description' => 'Marca alemana líder en ventas globales, reconocida por su calidad.'
            ],
            [
                'name' => 'Ford',
                'description' => 'Fabricante estadounidense destacado por sus camionetas y sedanes robustos.'
            ],
            [
                'name' => 'Renault',
                'description' => 'Marca francesa popular por sus vehículos compactos y económicos.'
            ],
            [
                'name' => 'Chevrolet',
                'description' => 'Marca americana conocida por su diversidad de vehículos y accesibilidad.'
            ],
            [
                'name' => 'Peugeot',
                'description' => 'Fabricante francés reconocido por su diseño y comodidad en automóviles.'
            ],
            [
                'name' => 'Fiat',
                'description' => 'Marca italiana destacada por sus vehículos pequeños y urbanos.'
            ],
            [
                'name' => 'Honda',
                'description' => 'Fabricante japonés líder en motos y vehículos de alta eficiencia.'
            ],
            [
                'name' => 'Yamaha',
                'description' => 'Marca japonesa referente en motocicletas de alto rendimiento y diseño.'
            ],
            [
                'name' => 'Kawasaki',
                'description' => 'Fabricante japonés famoso por sus motos deportivas y tecnología innovadora.'
            ],
        ];

        DB::table('brands')->insert($brands);
    }
}
