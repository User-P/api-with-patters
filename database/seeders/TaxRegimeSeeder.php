<?php

namespace Database\Seeders;

use App\Models\TaxRegime;
use Illuminate\Database\Seeder;

class TaxRegimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxRegimes = [
            ['key' => '601', 'description' => 'General de Ley Personas Morales'],
            ['key' => '603', 'description' => 'Personas Morales con Fines no Lucrativos'],
            ['key' => '605', 'description' => 'Sueldos y Salarios e Ingresos Asimilados a Salarios'],
            ['key' => '606', 'description' => 'Arrendamiento'],
            ['key' => '608', 'description' => 'Demás ingresos'],
            ['key' => '609', 'description' => 'Consolidación'],
            ['key' => '610', 'description' => 'Residentes en el Extranjero sin Establecimiento Permanente en México'],
            ['key' => '611', 'description' => 'Ingresos por Dividendos (socios y accionistas)'],
            ['key' => '612', 'description' => 'Personas Físicas con Actividades Empresariales y Profesionales'],
            ['key' => '614', 'description' => 'Ingresos por intereses'],
            ['key' => '616', 'description' => 'Sin obligaciones fiscales'],
            ['key' => '620', 'description' => 'Sociedades Cooperativas de Producción que optan por diferir sus ingresos'],
            ['key' => '621', 'description' => 'Incorporación Fiscal'],
            ['key' => '622', 'description' => 'Actividades Agrícolas, Ganaderas, Silvícolas y Pesqueras'],
            ['key' => '623', 'description' => 'Opcional para Grupos de Sociedades'],
            ['key' => '624', 'description' => 'Coordinados'],
            ['key' => '628', 'description' => 'Hidrocarburos'],
            ['key' => '607', 'description' => 'Régimen de Enajenación o Adquisición de Bienes'],
            ['key' => '629', 'description' => 'De los Regímenes Fiscales Preferentes y de las Empresas Multinacionales'],
            ['key' => '630', 'description' => 'Enajenación de acciones en bolsa de valores'],
            ['key' => '615', 'description' => 'Régimen de los ingresos por obtención de premios'],
            ['key' => '625', 'description' => 'Régimen de las Actividades Empresariales con ingresos a través de Plataformas Tecnológicas'],
            ['key' => '626', 'description' => 'Régimen Simplificado de Confianza'],
        ];

        foreach ($taxRegimes as $taxRegime) {
            TaxRegime::create($taxRegime);
        }
    }
}
