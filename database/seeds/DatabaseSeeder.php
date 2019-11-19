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
        /*$this->call(UsersTableSeeder::class);*/
        $this->call(TrucksTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(OwnersTableSeeder::class);
        $this->call(InspectionPointsTableSeeder::class);
        $this->call(BoxesTableSeeder::class);
    }
}
