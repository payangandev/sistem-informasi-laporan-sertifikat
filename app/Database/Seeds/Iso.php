<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Iso extends Seeder
{
    public function run()
    {
        $iso = [
            [
                'iso_id'                => 1,
                'nama'                  => 'Quality Management System',
                'kode_iso'              => '9001',
                'tanggal_terbit'        => '2022-02-05'
            ],
            [
                'iso_id'                => 2,
                'nama'                  => 'Environmental Management System',
                'kode_iso'              => '14001',
                'tanggal_terbit'        => '2022-01-04'
            ],
            [
                'iso_id'                => 3,
                'nama'                  => ' Occupational Health and Safety Management System',
                'kode_iso'              => '45001',
                'tanggal_terbit'        => '2022-02-01'
            ],

        ];
        $this->db->table('iso')->insertBatch($iso);
    }
}
