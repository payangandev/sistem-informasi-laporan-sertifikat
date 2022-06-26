<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Client extends Seeder
{
    public function run()
    {
        $client = [
            [
                'client_id'                => 1,
                'nama'                  => 'PT. Global Energi Power Indonesia',
            ],
            [
                'client_id'                => 2,
                'nama'                  => 'PT. Kencana Makmur Lestari',
            ],
            [
                'client_id'                => 3,
                'nama'                  => 'PT. Baliton Cakra perdana ',
            ],
            [
                'client_id'                => 4,
                'nama'                  => 'PT. Alfath Rizkindo Teknik ',
            ],
            [
                'client_id'                => 5,
                'nama'                  => 'PT. Tawakal Karya Teknik ',
            ],
            [
                'client_id'                => 6,
                'nama'                  => 'PT. Trian Naga Jaya ',
            ],

        ];
        $this->db->table('client')->insertBatch($client);
    }
}
