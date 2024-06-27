<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CheckUpType;

class CheckupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checkupTypes = ['Option Items', 'Key Items', 'Basic Items'];

        foreach ($checkupTypes as $checkup) {

            $type = new CheckUpType();
            $type->name_en = $checkup;
            $type->save();

        }
        
    }
}
