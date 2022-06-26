<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Skt extends Seeder
{
    public function run()
    {
        $skt = [
            [
                'skt_id'                => 1,
                'nama'                  => 'Pelaksana Pekerjaan Jalan',
                'tanggal_terbit'        => '2022-03-10'
            ],
            [
                'skt_id'                => 2,
                'nama'                  => 'Pelaksana Pekerjaan Jembatan',
                'tanggal_terbit'        => '2022-03-16'
            ],
            [
                'skt_id'                 => 3,
                'nama'                   => 'Pelaksana Plambing / Pekerjaan Plambing',
                'tanggal_terbit'         => '2022-03-12'
            ],
            [
                'skt_id'                 => 4,
                'nama'                   => 'Pelaksana Bangunan Gedung / Pekerjaan Gedung',
                'tanggal_terbit'         => '2022-03-08'
            ],

        ];
        $this->db->table('skt')->insertBatch($skt);
    }
}
