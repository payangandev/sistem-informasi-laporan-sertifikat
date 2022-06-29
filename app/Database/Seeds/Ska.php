<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Ska extends Seeder
{
    public function run()
    {
        $ska = [
            [
                'ska_id'                    => 1,
                'nama'                      => 'Ahli Teknik Bangunan Gedung',
                'tanggal_terbit'            => '2022-03-10'
            ],
            [
                'ska_id'                    => 2,
                'nama'                      => 'Ahli Teknik Jalan',
                'tanggal_terbit'            => '2022-03-16'
            ],
            [
                'ska_id'                    => 3,
                'nama'                      => 'Ahli Sumber Daya Air',
                'tanggal_terbit'            => '2022-03-12'
            ],
            [
                'ska_id'                    => 4,
                'nama'                      => 'Ahli K3 Konstruksi',
                'tanggal_terbit'            => '2022-03-02'
            ],

        ];
        $this->db->table('ska')->insertBatch($ska);
    }
}
