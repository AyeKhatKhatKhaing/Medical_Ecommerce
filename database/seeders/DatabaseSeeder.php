<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AllergicDisease;
use App\Models\BloodType;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(PermissionsSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(FaqCategorySeeder::class);
        $this->call(SaleCategorySeeder::class);
        $this->call(PromotionCategorySeeder::class);
        $this->call(CheckUpTableSeeder::class);
        $this->call(CheckUpTypeSeeder::class);
        $this->call(CheckUpGroupSeeder::class);
        $this->call(CheckUpItemSeeder::class);
        $this->call(CustomNotificationSeeder::class);
        $this->call(ProuctBannerSeeder::class);
        $this->call(OfficeInfoSeeder::class);
        $this->call(AgeGroupSeeder::class);
        $this->call(RelationshipTypeSeeder::class);
        $this->call(VaccineSeeder::class);
        $this->call(BloodTypeSeeder::class);
        $this->call(MaritialStatusSeeder::class);
        $this->call(MainTypeOfAlcoholSeeder::class);
        $this->call(AmountOfAlcoholDrinkingSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(AllergicDisease::class);
        $this->call(CouponTermsofUseSeeder::class);
    }
}