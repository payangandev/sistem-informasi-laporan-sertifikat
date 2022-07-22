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
                'nama_karyawan'             => 'Ahmad Syahroni',
                'type_sertifikat'           => 'ISO',
                'status_sertifikat'         => 'selesai',
                'description'               => 'done',

            ],
            [
                'arsip_id'                  => 2,
                'client_id'                 => 1,
                'nama_karyawan'             => 'Febrana',
                'type_sertifikat'           => 'SKT',
                'status_sertifikat'         => 'selesai',
                'description'               => 'done',
            ],
            [
                'arsip_id'                  => 3,
                'client_id'                 => 1,
                'nama_karyawan'             => 'Laila sari',
                'type_sertifikat'           => 'ISO',
                'status_sertifikat'         => 'selesai',
                'description'               => 'done',
            ],

        ];
        $this->db->table('arsip')->insertBatch($arsip);
    }
}
