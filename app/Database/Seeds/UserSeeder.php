<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1 data
        // $data = [
        //     'name_user' => 'Administrator',
        //     'email_user' => 'dev.khafid@gmail.com',
        //     'password_user' => password_hash('12345', PASSWORD_BCRYPT),
        // ];

        // $this->db->table('users')->insert($data);


        //multi data
        $data = [
            [
                'name_user' => 'Khafd',
                'email_user' => 'khafid@gmail.com',
                'password_user' => password_hash('12345', PASSWORD_BCRYPT),
            ],
            [
                'name_user' => 'Aulia',
                'email_user' => 'aulia@gmail.com',
                'password_user' => password_hash('aulia', PASSWORD_BCRYPT),
            ]
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
