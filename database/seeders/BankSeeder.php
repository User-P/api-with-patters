<?php

    namespace Database\Seeders;

    use App\Models\Bank;
    use Illuminate\Database\Seeder;

    class BankSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            $banks = [
                ['name' => 'EFECTIVO', 'code' => '40138'],
                ['name' => 'CHEQUES', 'code' => '40139'],
                ['name' => 'Banco Ahorro Famsa, S.A.', 'code' => '00000'],
                ['name' => 'Banco Wal-Mart, S.A.', 'code' => '00001'],
                ['name' => 'ACENDO BANK', 'code' => '40102'],
                ['name' => 'ACTINVER', 'code' => '40133'],
                ['name' => 'AFIRME', 'code' => '40062'],
                ['name' => 'AKALA', 'code' => '90638'],
                ['name' => 'AMERICAN EXPRESS', 'code' => '40103'],
                ['name' => 'ASP INTEGRA OPC', 'code' => '90659'],
                ['name' => 'AUTOFIN', 'code' => '40128'],
                ['name' => 'AZTECA', 'code' => '40127'],
                ['name' => 'BAJIO', 'code' => '40030'],
                ['name' => 'BANAMEX', 'code' => '40002'],
                ['name' => 'BANCO FINTERRA', 'code' => '40154'],
                ['name' => 'BANCO BANCOMEXT', 'code' => '37006'],
                ['name' => 'BANCOPPEL', 'code' => '40137'],
                ['name' => 'BANCO S3', 'code' => '40160'],
                ['name' => 'BANCREA', 'code' => '40152'],
                ['name' => 'BANJERCITO', 'code' => '37019'],
                ['name' => 'BANKAOOL', 'code' => '40147'],
                ['name' => 'BANKS OF AMERICA', 'code' => '40106'],
                ['name' => 'BANOBRAS', 'code' => '37009'],
                ['name' => 'BANORTE', 'code' => '40072'],
                ['name' => 'BANREGIO', 'code' => '40058'],
                ['name' => 'BANSEFI', 'code' => '37166'],
                ['name' => 'BANSI', 'code' => '40060'],
                ['name' => 'BANXICO', 'code' => '2001'],
                ['name' => 'BARCLAYS', 'code' => '40129'],
                ['name' => 'BBASE', 'code' => '40145'],
                ['name' => 'BBVA BANCOMER', 'code' => '40012'],
                ['name' => 'BMONEX', 'code' => '40112'],
                ['name' => 'CAJA POP MEXICA', 'code' => '90677'],
                ['name' => 'CAJA TELEFONIST', 'code' => '90683'],
                ['name' => 'CB INTERCAM', 'code' => '90630'],
                ['name' => 'CIBANCO', 'code' => '40143'],
                ['name' => 'CI BOLSA', 'code' => '90631'],
                ['name' => 'CLS', 'code' => '90901'],
                ['name' => 'CoDI VALIDA', 'code' => '90903'],
                ['name' => 'COMPARTAMOS', 'code' => '40130'],
                ['name' => 'CONSUBANCO', 'code' => '40140'],
                ['name' => 'CREDICAPITAL', 'code' => '90652'],
                ['name' => 'CREDIT SUISSE', 'code' => '40126'],
                ['name' => 'CRISTOBAL COLON', 'code' => '90680'],
                ['name' => 'DEUTSCHE', 'code' => '40124'],
                ['name' => 'DONDE', 'code' => '40151'],
                ['name' => 'ESTRUCTURADORES', 'code' => '90606'],
                ['name' => 'EVERCORE', 'code' => '90648'],
                ['name' => 'FINAMEX', 'code' => '90616'],
                ['name' => 'FINCOMUN', 'code' => '90634'],
                ['name' => 'FOMPED', 'code' => '90689'],
                ['name' => 'FONDO (FIRA)', 'code' => '90685'],
                ['name' => 'GBM', 'code' => '90601'],
                ['name' => 'HDI SEGUROS', 'code' => '90636'],
                ['name' => 'HIPOTECARIA FED', 'code' => '37168'],
                ['name' => 'HSBC', 'code' => '40021'],
                ['name' => 'ICBC', 'code' => '40155'],
                ['name' => 'INBURSA', 'code' => '40036'],
                ['name' => 'INDEVAL', 'code' => '90902'],
                ['name' => 'INMOBILIARIO', 'code' => '40150'],
                ['name' => 'INTERCAM BANCO', 'code' => '40136'],
                ['name' => 'INVERCAP', 'code' => '90686'],
                ['name' => 'INVEX', 'code' => '40059'],
                ['name' => 'JP MORGAN', 'code' => '40110'],
                ['name' => 'KUSPIT', 'code' => '90653'],
                ['name' => 'LIBERTAD', 'code' => '90670'],
                ['name' => 'MASARI', 'code' => '90602'],
                ['name' => 'MIFEL', 'code' => '40042'],
                ['name' => 'MIZUHO banks', 'code' => '40158'],
                ['name' => 'MONEXCB', 'code' => '90600'],
                ['name' => 'MUFG', 'code' => '40108'],
                ['name' => 'MULTIVA BANCO', 'code' => '40132'],
                ['name' => 'NAFIN', 'code' => '37135'],
                ['name' => 'OPM', 'code' => '90684'],
                ['name' => 'PAGATODO', 'code' => '40148'],
                ['name' => 'PROFUTURO', 'code' => '90620'],
                ['name' => 'SABADELL', 'code' => '40156'],
                ['name' => 'SANTANDER', 'code' => '40014'],
                ['name' => 'Scotiabank', 'code' => '40044'],
                ['name' => 'SHINHAN', 'code' => '40157'],
                ['name' => 'STP', 'code' => '90646'],
                ['name' => 'UNAGRA', 'code' => '90656'],
                ['name' => 'VALMEX', 'code' => '90617'],
                ['name' => 'VALUE', 'code' => '90605'],
                ['name' => 'VECTOR', 'code' => '90608'],
                ['name' => 'VE POR MAS', 'code' => '40113'],
                ['name' => 'VOLKSWAGEN', 'code' => '40141']
            ];

            foreach ($banks as $bank) {
                Bank::create($bank);
            }
        }
    }
