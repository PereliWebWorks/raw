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
        //factory(App\User::class, 5)->create();
        $drew = new App\User;
        $drew->name = 'Drew Pereli';
        $drew->email = 'drewperelirawrecovery@gmail.com';
        $drew->role_id = App\Role::where('name', '=', 'admin')->firstOrFail()->id;
        $drew->password = '$2y$10$nCi97LRvmCIL2rEitCTc7e8VqSQG0/OZznl2sn.moSgNZrDWnJPGO';
        $drew->save();
    }
}
