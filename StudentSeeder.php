<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Auth\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Faker::create('id_ID');
        $jk = array_random(['Pria','Wanita']);

        $class = $faker->randomElement(['1', '2', '3']);
        $vocation = $faker->randomElement(['1', '2','3','4','5']);
        $status = $faker->randomElement(['Guru', 'Siswa']);
        $gender = $faker->randomElement(['male', 'female']);

    	for($i = 1; $i <= 10; $i++){
            $name  = $faker->name($gender);
            //$sub_name = substr($name,0,3);
            $fname = explode(' ',$name);
            $sub_name = array_shift($fname);
            $value = strtolower($sub_name);
            $domain = "mail.com";
            $email = $value.'@'.$domain;

    		User::insert([
    			'name' => $name,
    			'gender' => $jk,
    			'avatar' => $jk . '.png',
                'status' => "Siswa",
                'class_id' => $class,
                'vocation_id' => $vocation,
                'email' =>  $email,
                'password' => bcrypt('password')
            ]);
            
    	}
    }
}

