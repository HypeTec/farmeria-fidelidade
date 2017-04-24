<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try
        {
            \App\User::firstOrCreate([
                'name' => 'Administrador',
                'username' => 'admin',
                'password' => bcrypt('password'),


            ]);
        }
        catch (Exception $ex)
        {
            $this->command->getOutput()->writeln("<error>Admin já existe</error>");
        }

    }
}
