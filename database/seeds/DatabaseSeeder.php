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
        $this->call('UsersTableSeeder');
        $this->call('TrucksTableSeeder');
        $this->call('BoxesTableSeeder');
        $this->call('TypesTableSeeder');
        $this->call('PartsTableSeeder');
        $this->call('SubpartsTableSeeder');
        // $this->call('BrandsTableSeeder');
        // $this->call('ServicesTableSeeder');
        // $this->call('OwnersTableSeeder');
        // $this->call('InspectionPointsTableSeeder');
        // $this->call('DriversTableSeeder');
        // $this->call('CoordinatorsTableSeeder');
        // $this->call('MechanicsTableSeeder');
    }
}
