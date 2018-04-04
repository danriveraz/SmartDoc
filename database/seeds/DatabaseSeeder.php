<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model; // <- added this

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seedDepartamento::class);
    }
}
