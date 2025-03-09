<?php

namespace Database\Seeders;

use App\Models\PaymentMethodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethodTypes = [
            ['key' => 'PUE', 'description' => 'Pago en una sola exhibición (de contado).'],
            ['key' => 'PPD', 'description' => 'Pago en parcialidades o diferido (total o parcialmente a crédito). Requiere expedir un comprobante de pago cuando se reciba un pago subsecuente.'],
        ];

        foreach ($paymentMethodTypes as $paymentMethodType) {
            PaymentMethodType::create($paymentMethodType);
        }
    }
}
