<?php

    namespace App\Services;

    use Facturapi\Facturapi;

    class FacturapiService
    {
        protected Facturapi $facturapi;
        protected string $apiKey;

        public function __construct()
        {
            $this->apiKey = env('FACTURAPI_API_KEY');
            $this->facturapi = new Facturapi($this->apiKey);
        }

        public function createClient($data)
        {
            return $this->facturapi->Customers->create($data);
        }

        public function createInvoice($data)
        {
            return $this->facturapi->Invoices->create($data);
        }
    }
