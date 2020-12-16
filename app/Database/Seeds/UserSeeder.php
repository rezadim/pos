<?php namespace App\Database\Seeds;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data1 = [
            'username'=>'admin',
            'password'=>'123',
            'user_created_at'=>date('Y-m-d H:i:s')
        ];
        $data2 = [
            'username'=>'user',
            'password'=>'123',
            'user_created_at'=>date('Y-m-d H:i:s')
        ];

        $this->db->table('users')->insert($data1);
        $this->db->table('users')->insert($data2);
    }
}