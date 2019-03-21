<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = '[
            {
                "first_name": "Admin",
                "last_name": "Amon",
                "email": "waitaamon@jkuat.ac.ke",
                "identifier": "BACC001",
                "phone": "254727269414",
                "password": "admin100"
            }
        ]';

        foreach (json_decode($users) as $user) {
            $u = new \App\Models\User();

            $u->first_name = $user->first_name;
            $u->last_name = $user->last_name;
            $u->email = $user->email;
            $u->identifier = $user->identifier;
            $u->phone = $user->phone;
            $u->password = bcrypt($user->password);
            $u->save();
        }
    }
}
