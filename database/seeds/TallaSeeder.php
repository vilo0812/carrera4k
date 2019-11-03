<?php

use App\Talla;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Talla::class,10)->create();
    }
}
