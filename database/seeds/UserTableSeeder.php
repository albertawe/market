<?php
use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{
	public function run(){
	//DB::table('users')->truncate();
	$user = array(
	'name'=>'Administrator',
	'email' => 'admin@admin.com',
	'password' => Hash::make('admin'),
	'created_at' => DB::raw('now()'),
	'updated_at' => DB::raw('now()'),);
	DB::table('users')->insert($user);
	}
}