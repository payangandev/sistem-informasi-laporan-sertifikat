<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Arsip extends Seeder
{
    public function run()
    {
        $arsip = [
            [
                'arsip_id'                  => 1,
                'client_id'                 => 1,
                'nama'                      => 'Ahmad Syahroni',
                'type_sertifikat'           => 'ISO',
                'status'                    => 'selesai',
                'description'               => 'done',

            ],
            [
                'arsip_id'                  => 2,
                'client_id'                 => 2,
                'nama'                      => 'Febrana',
                'type_sertifikat'           => 'SKT',
                'status'                    => 'selesai',
                'description'               => 'done',
            ],
            [
                'arsip_id'                  => 3,
                'client_id'                 => 3,
                'nama'                      => 'Laila sari',
                'type_sertifikat'           => 'ISO',
                'status'                    => 'selesai',
                'description'               => 'done',
            ],

        ];
        $this->db->table('arsip')->insertBatch($arsip);
    }
}
