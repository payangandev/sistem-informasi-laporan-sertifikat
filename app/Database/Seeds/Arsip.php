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
                'nama_kayawan'                      => 'Ahmad Syahroni',
                'type_sertifikat'           => 'ISO',
                'status'                    => 'selesai',
                'description'               => 'done',

            ],
            [
                'arsip_id'                  => 2,
                'client_id'                 => 2,
                'nama_kayawan'                      => 'Febrana',
                'type_sertifikat'           => 'SKT',
                'status'                    => 'selesai',
                'description'               => 'done',
            ],
            [
                'arsip_id'                  => 3,
                'client_id'                 => 3,
                'nama_kayawan'                      => 'Laila sari',
                'type_sertifikat'           => 'ISO',
                'status'                    => 'selesai',
                'description'               => 'done',
            ],

        ];
        $this->db->table('arsip')->insertBatch($arsip);
    }
}
