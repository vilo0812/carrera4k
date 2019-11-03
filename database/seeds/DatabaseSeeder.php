<?php

use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncateTable([
    		'grados',
        'participantes',
        'tallas',
        'direcciones',
        'distancias',
        'registros'
        ]);
        $this->call(GradoSeeder::class);
        $this->call(ParticipanteSeeder::class);
        $this->call(TallaSeeder::class);
        $this->call(DireccionSeeder::class);
        $this->call(DistanciaSeeder::class);
        $this->call(RegistroSeeder::class);
    }
    public function truncateTable(array $tables){
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
      foreach($tables as $table){
          DB::table($table)->truncate();
      }
      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

}
