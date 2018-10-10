<?php

use Illuminate\Database\Seeder;

class MnsecTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	   factory(App\mnsec::class, 5)->create();
    }
}
