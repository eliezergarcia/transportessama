<?php

use App\Subpart;
use Illuminate\Database\Seeder;

class SubpartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subpart::create([
        	'truck_id' => 3,
        	'box_id' => null,
        	'part_id' => 3,
            'name' => 'Rotochambre',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 1,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => 3,
        	'box_id' => null,
        	'part_id' => 3,
            'name' => 'Balatas',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 2,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => 3,
        	'box_id' => null,
        	'part_id' => 5,
            'name' => 'Llanta',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 2,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => 3,
        	'box_id' => null,
        	'part_id' => 5,
            'name' => 'Birlos',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 1,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => null,
        	'box_id' => 1,
        	'part_id' => 9,
            'name' => 'Amortiguadores',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 1,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => null,
        	'box_id' => 1,
        	'part_id' => 9,
            'name' => 'Muelles',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 2,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => null,
        	'box_id' => 1,
        	'part_id' => 11,
            'name' => 'Llanta',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 2,
            'notes' => null
        ]);

        Subpart::create([
        	'truck_id' => null,
        	'box_id' => 1,
        	'part_id' => 11,
            'name' => 'Birlos',
            'instalation_date' => '21/04/16',
            'instalation_mileage' => '315210',
            'expiration_mileage' => '325210',
            'number' => null,
            'ubication' => null,
            'status' => 2,
            'notes' => null
        ]);
    }
}
