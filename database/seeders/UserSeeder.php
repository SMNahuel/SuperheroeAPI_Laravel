<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* 
        *   Usuarios de prueba
        *   Usuario Admin
        *   Usuario Normal
        */
        
        $user = User::create([
            'photoUrl' => 'https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg',
            'email' => 'test@test.com',
            'password' => '$2y$10$s1fTRqJHngrfl4Od3IkCeOG/2/4MijjT7Z2K4fTULzlaPUSc1tvi6',/* 123456 */
            'nickname' => 'test',
            'name' => 'TEST',
            'rol' => '1'
        ]);
        
        /* Agregamos algunos superheroe al usuario */
        $user->superheroe()->attach(2);
        $user->superheroe()->attach(5);
        $user->superheroe()->attach(8);

        $user2 =User::create([
            'photoUrl' => 'https://static.vecteezy.com/system/resources/previews/008/442/086/non_2x/illustration-of-human-icon-user-symbol-icon-modern-design-on-blank-background-free-vector.jpg',
            'email' => 'test@admin.com',
            'password' => '$2y$10$s1fTRqJHngrfl4Od3IkCeOG/2/4MijjT7Z2K4fTULzlaPUSc1tvi6',/* 123456 */
            'nickname' => 'test',
            'name' => 'TEST',
            'rol' => '2'
        ]);
        /* Agregamos algunos superheroe al usuario */
        $user2->superheroe()->attach(5);
        $user2->superheroe()->attach(7);
        $user2->superheroe()->attach(52);
    }
}
