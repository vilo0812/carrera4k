<?php

use App\Registro;
use Illuminate\Database\Seeder;

class RegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Registro::class,1000)->create();
    }
}
