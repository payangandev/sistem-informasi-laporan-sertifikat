<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Client extends Seeder
{
    public function run()
    {
        $client = [
            [
                'client_id'                 => 1,
                'nama'                      => 'PT. Global Energi Power Indonesia',
                'email'                     => '',
                'alamat'                    => '',
                'telephone'                 => '02198529922',
            ],
            [
                'client_id'                 => 2,
                'nama'                      => 'PT. Kencana Makmur Lestari',
                'email'                     => '',
                'alamat'                    => '',
                'telephone'                 => '02155771592',
            ],
            [
                'client_id'                 => 3,
                'nama'                      => 'PT. Baliton Cakra perdana ',
                'email'                     => '',
                'alamat'                    => '',
                'telephone'                 => '02175820525',
            ],
            [
                'client_id'                 => 4,
                'nama'                      => 'PT. Alfath Rizkindo Teknik ',
                'email'                     => '',
                'alamat'                    => '',
                'telephone'                 => '02185525152',
            ],
        ];
        $this->db->table('client')->insertBatch($client);
    }
}
