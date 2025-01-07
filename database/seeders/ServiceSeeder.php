<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Cambio de Aceite',
                'description' => 'Servicio completo de cambio de aceite y revisión de filtros.'
            ],
            [
                'name' => 'Alineación y Balanceo',
                'description' => 'Ajuste y calibración de las ruedas para un manejo estable y seguro.'
            ],
            [
                'name' => 'Diagnóstico Electrónico',
                'description' => 'Revisión con herramientas electrónicas para identificar problemas en el vehículo.'
            ],
            [
                'name' => 'Revisión de Frenos',
                'description' => 'Inspección y reparación de sistemas de frenos, incluyendo cambio de pastillas.'
            ],
            [
                'name' => 'Mantenimiento Preventivo',
                'description' => 'Chequeo general del vehículo para evitar fallas futuras.'
            ],
            [
                'name' => 'Reparación de Suspensión',
                'description' => 'Solución de problemas en los amortiguadores y componentes de suspensión.'
            ],
            [
                'name' => 'Cambio de Neumáticos',
                'description' => 'Sustitución de llantas y ajuste de presión para una conducción segura.'
            ],
        ];

        DB::table('services')->insert($services);
    }
}
