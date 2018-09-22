<?php

use Illuminate\Database\Seeder;

class UserAuthorizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auth = new App\UserAuthorization;
        $auth->user_id = App\User::where('email', '=', 'drewperelirawrecovery@gmail.com')->firstOrFail()->id;
        $auth->save();
    }
}
