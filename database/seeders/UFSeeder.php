<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UFSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('UF')->insert([
            'Sigla' => 'RS',
            'Nome' => 'Rio Grande do Sul',
            'CodigoIBGE' => '43',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'SC',
            'Nome' => 'Santa Catarina',
            'CodigoIBGE' => '42',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'PR',
            'Nome' => 'Paraná',
            'CodigoIBGE' => '41',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'SP',
            'Nome' => 'São Paulo',
            'CodigoIBGE' => '35',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'MG',
            'Nome' => 'Minas Gerais',
            'CodigoIBGE' => '31',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'ES',
            'Nome' => 'Espírito Santo',
            'CodigoIBGE' => '32',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'RJ',
            'Nome' => 'Rio de Janeiro',
            'CodigoIBGE' => '33',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'RN',
            'Nome' => 'Rio Grande do Norte',
            'CodigoIBGE' => '24',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'CE',
            'Nome' => 'Ceará',
            'CodigoIBGE' => '23',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'PE',
            'Nome' => 'Pernambuco',
            'CodigoIBGE' => '26',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'PB',
            'Nome' => 'Paraíba',
            'CodigoIBGE' => '25',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'AL',
            'Nome' => 'Alagoas',
            'CodigoIBGE' => '27',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'SE',
            'Nome' => 'Sergipe',
            'CodigoIBGE' => '28',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'BA',
            'Nome' => 'Bahia',
            'CodigoIBGE' => '29',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'AM',
            'Nome' => 'Amazonas',
            'CodigoIBGE' => '13',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'AP',
            'Nome' => 'Amapá',
            'CodigoIBGE' => '16',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'PA',
            'Nome' => 'Pará',
            'CodigoIBGE' => '15',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'AC',
            'Nome' => 'Acre',
            'CodigoIBGE' => '12',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'RO',
            'Nome' => 'Rondônia',
            'CodigoIBGE' => '11',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'RR',
            'Nome' => 'Roraima',
            'CodigoIBGE' => '14',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'TO',
            'Nome' => 'Tocantins',
            'CodigoIBGE' => '17',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'MT',
            'Nome' => 'Mato Grosso',
            'CodigoIBGE' => '51',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'MS',
            'Nome' => 'Mato Grosso do Sul',
            'CodigoIBGE' => '50',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'GO',
            'Nome' => 'Goiás',
            'CodigoIBGE' => '52',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'DF',
            'Nome' => 'Distrito Federal',
            'CodigoIBGE' => '53',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'PI',
            'Nome' => 'Piauí',
            'CodigoIBGE' => '22',
            'PaisId' => 1,
        ]);

        DB::table('UF')->insert([
            'Sigla' => 'MA',
            'Nome' => 'Maranhão',
            'CodigoIBGE' => '21',
            'PaisId' => 1,
        ]);

        
    }
}
