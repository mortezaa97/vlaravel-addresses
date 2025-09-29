<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\Status;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Mortezaa97\Addresses\Models\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fa_IR');
        $items = [];

        $userIds = User::role('user')->pluck('id');
        $countyIds = DB::table('counties')->pluck('id')->toArray();

        $statuses = [Status::ACTIVE, Status::INACTIVE];
        $titleOptions = [
            'خانه',
            'محل کار',
            'دفتر',
            'آدرس پستی',
            'آدرس موقت',
        ];

        for ($i = 0; $i < 5; $i++) {
            $countyId = ! empty($countyIds) ? $faker->randomElement($countyIds) : 1;

            $items[] = [
                'county_id' => $countyId,
                'title' => $faker->randomElement($titleOptions),
                'address' => $faker->streetAddress,
                'phone' => $faker->e164PhoneNumber,
                'postal_code' => $faker->numberBetween(1000000000, 9999999999),
                'longitude' => $faker->longitude(48, 64),
                'latitude' => $faker->latitude(25, 40),
                'status' => $faker->randomElement($statuses),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'created_by' => $faker->randomElement($userIds),
            ];
        }

        Address::insert($items);
    }
}
