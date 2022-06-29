<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'            => 1,
                'nama_user'     => 'Febra Siahaan',
                'username'      => 'febra001',
                'password'      => 'febra001',
                'level'         => 1
            ],
            [
                'id'            => 2,
                'nama_user'     => 'Dita',
                'username'      => 'dita001',
                'password'      => 'dita001',
                'level'         => 2
            ]
        ];

        $this->db->table('users')->insertBatch($users);
    }
}
