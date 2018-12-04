<?php

use Illuminate\Database\Seeder;
use App\Models\Apartment;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Apartment::truncate();
        $file = storage_path('app/public/property-data.csv');
        $contents = file($file);

        $csv = array_slice(array_map('str_getcsv', $contents),1);

        foreach($csv as $item){
            factory(Apartment::class)->create([
                'name' => $item[0],
                'price' => $item[1],
                'bedrooms' => $item[2],
                'bathrooms' => $item[3],
                'storeys' => $item[4],
                'garages' => $item[5],
            ]);
        }
    }
}
