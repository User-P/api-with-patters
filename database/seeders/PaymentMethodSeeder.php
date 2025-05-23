<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            ['key' => '01', 'description' => 'Efectivo'],
            ['key' => '02', 'description' => 'Cheque nominativo'],
            ['key' => '03', 'description' => 'Transferencia electrónica de fondos'],
            ['key' => '04', 'description' => 'Tarjeta de crédito'],
            ['key' => '05', 'description' => 'Monedero electrónico'],
            ['key' => '06', 'description' => 'Dinero electrónico'],
            ['key' => '08', 'description' => 'Vales de despensa'],
            ['key' => '12', 'description' => 'Dación en pago'],
            ['key' => '13', 'description' => 'Pago por subrogación'],
            ['key' => '14', 'description' => 'Pago por consignación'],
            ['key' => '15', 'description' => 'Condonación'],
            ['key' => '17', 'description' => 'Compensación'],
            ['key' => '23', 'description' => 'Novación'],
            ['key' => '24', 'description' => 'Confusión'],
            ['key' => '25', 'description' => 'Remisión de deuda'],
            ['key' => '26', 'description' => 'Prescripción o caducidad'],
            ['key' => '27', 'description' => 'A satisfacción del acreedor'],
            ['key' => '28', 'description' => 'Tarjeta de débito'],
            ['key' => '29', 'description' => 'Tarjeta de servicios'],
            ['key' => '30', 'description' => 'Aplicación de anticipos'],
            ['key' => '31', 'description' => 'Intermediario pagos'],
            ['key' => '99', 'description' => 'Por definir'],
        ];

        foreach ($paymentMethods as $paymentMethod) {
            PaymentMethod::create($paymentMethod);
        }
    }
}
