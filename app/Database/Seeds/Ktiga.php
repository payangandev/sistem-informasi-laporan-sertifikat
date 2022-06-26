<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Ktiga extends Seeder
{
    public function run()
    {
        $ktiga = [
            [
                'ktiga_id'              => 1,
                'nama'                  => 'Ahli Sumber Daya Air',
                'tanggal_terbit'        => '2022-03-10'
            ],
            [
                'ktiga_id'              => 2,
                'nama'                  => 'Ahli Teknik Bangunan Gedung',
                'tanggal_terbit'        => '2022-03-16'
            ],
            [
                'ktiga_id'              => 3,
                'nama'                  => 'Ahli Teknik Jalan',
                'tanggal_terbit'        => '2022-03-12'
            ],

        ];
        $this->db->table('ktiga')->insertBatch($ktiga);
    }
}
