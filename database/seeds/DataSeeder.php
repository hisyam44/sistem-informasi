<?php

use Illuminate\Database\Seeder;
use App\Transfer;
use App\User;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'name'=>'Admin',
                'email'=>'admin@example.com',
                'password'=>Hash::make('qweasd'),
                'saldo'=>'0'
            ]);
/*        for($i=0;$i<10;$i++){
        	$transfer = Transfer::create([
        		'title'=>'Lorem Ipsum',
        		'category'=>'credit',
        		'amount'=>'10000',
                'saldo_temporary'=>'12000',
        		'published_at'=>\Carbon\Carbon::now(),
        		'description'=>'Lorem Ipsum'
        	]);
        }*/
    }
}
