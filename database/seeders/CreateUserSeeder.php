<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = $this->command->getOutput()->ask('Unesite ime korisnika.');
        if($name == null){
            $this->command->getOutput()->error('Niste unijeli ime korisnika');
        }

        $email = $this->command->getOutput()->ask('Unesite email.');
        if($email == null){
            $this->command->getOutput()->error('Niste unijeli email');
        }

        $password = $this->command->getOutput()->ask('Unesite password.');
        if($password == null){
            $this->command->getOutput()->error('Niste unijeli password');
        }

        $user = User::where(['email'=>$email])->first();
        

        if($user == null){
            User::create([
                'name'=>$name,
                'email'=>$email,
                'password'=>Hash::make($password) 
             ]);
        $this->command->getOutput()->info('Uspjesno ste registrovali novog korisnika');
        }else{
            $this->command->getOutput()->error('Korisnik sa ovim emailom postoji u bazi');
        }
        

    }
}
