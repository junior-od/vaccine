<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'first_name'	=>	'Roland',
                'last_name'	=>	'Oduberu',
                'email' 		=>  'roliod@yahoo.com',
                'password' 		=>   bcrypt('password'),
                'telephone'	=>	'09028742948',
                'role_id' => 1,
                'api_token' => 'y9ntVwhwC1wBulTzHMSIFwnLeiIFoybWAmhnivfqxP2BlNeLe7aLB59rJuOX',
            ],
            [
                'first_name'	=>	'John',
                'last_name'	=>	'Snow',
                'email' 		=>  'rolandoduberu@gmail.com',
                'password' 		=>   bcrypt('password'),
                'telephone'	=>	'09028742948',
                'role_id' => 2,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
