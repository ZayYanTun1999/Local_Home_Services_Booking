<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        echo "Seeding Locations...\n";

        // =====================
        // CITIES
        // =====================
        $city_data = [
            ['name' => 'Yangon'],
            ['name' => 'Mandalay'],
            ['name' => 'Naypyidaw'],
            ['name' => 'Pathein'],
            ['name' => 'Taunggyi'],
            ['name' => 'Monywa'],
            ['name' => 'Bago'],
            ['name' => 'Magwe'],
            ['name' => 'Sittwe'],
            ['name' => 'Mawlamyine'],
            ['name' => 'Hpa-An'],
            ['name' => 'Myitkyina'],
            ['name' => 'Dawei'],
            ['name' => 'Hakha'],
            ['name' => 'Loikaw'],
            ['name' => 'Hopang'],
            ['name' => 'Pindaya'],
            ['name' => 'Laukkai'],
            ['name' => 'Lahe'],
            ['name' => 'Namhsan'],
        ];

        foreach ($city_data as $city) {
            DB::table('cities')->updateOrInsert(
                ['name' => $city['name']],
                ['name' => $city['name']]
            );
        }

        // Get city IDs
        $cityIds = DB::table('cities')->pluck('id', 'name');

        // =====================
        // TOWNSHIPS
        // =====================
        $myanmar_city_townships = [
            'Yangon' => [
                ['name' => 'Mingaladon'], ['name' => 'Shwepyitha'], ['name' => 'Insein'],
                ['name' => 'Hlaingthaya East'], ['name' => 'Hlaingthaya West'],
                ['name' => 'Seikkyi Kanaungto'], ['name' => 'Dala'], ['name' => 'Twante'],
                ['name' => 'Kungyangon'], ['name' => 'Kawhmu'],
                ['name' => 'Kyauktada'], ['name' => 'Pabedan'], ['name' => 'Lanmadaw'],
                ['name' => 'Latha'], ['name' => 'Dagon'], ['name' => 'Ahlon'],
                ['name' => 'Kyimyindaing'], ['name' => 'Sanchaung'],
                ['name' => 'Mayangon'], ['name' => 'North Okkalapa'],
                ['name' => 'Thingangyun'], ['name' => 'South Okkalapa'],
                ['name' => 'Tamwe'], ['name' => 'Yankin'],
                ['name' => 'Botataung'], ['name' => 'Dawbon'],
                ['name' => 'Mingala Taungnyunt'], ['name' => 'Pazundaung'],
                ['name' => 'Thaketa'], ['name' => 'Dagon Seikkan'],
                ['name' => 'South Dagon'], ['name' => 'North Dagon'],
                ['name' => 'East Dagon'], ['name' => 'Kamayut'], ['name' => 'Bahan'],
            ],

            'Mandalay' => [
                ['name' => 'Aungmyethazan'], ['name' => 'Chanayethazan'],
                ['name' => 'Chanmyathazi'], ['name' => 'Maha Aungmye'],
                ['name' => 'Pyigyidagun'], ['name' => 'Amarapura'],
                ['name' => 'Myitnge'], ['name' => 'Patheingyi'],
            ],

            'Naypyidaw' => [
                ['name' => 'Ottarathiri'], ['name' => 'Tatkone'],
                ['name' => 'Zeyathiri'], ['name' => 'Pobbathiri'],
                ['name' => 'Dekkhinathiri'], ['name' => 'Lewe'],
                ['name' => 'Pyinmana'], ['name' => 'Zabuthiri'],
            ],

            'Pathein' => [
                ['name' => 'Kangyidaunt'], ['name' => 'Ngapudaw'],
                ['name' => 'Pathein'], ['name' => 'Thabaung'],
                ['name' => 'Hainggyikyun'], ['name' => 'Ngayokaung'],
                ['name' => 'Ngwesaung'], ['name' => 'Shwethaungyan'],
            ],

            'Taunggyi' => [
                ['name' => 'Taunggyi'], ['name' => 'Lawksawk'],
            ],

            'Monywa' => [
                ['name' => 'Ayadaw'], ['name' => 'Budalin'],
                ['name' => 'Chaung-U'], ['name' => 'Monywa'],
            ],

            'Bago' => [
                ['name' => 'Bago'], ['name' => 'Kawa'],
                ['name' => 'Thanatpin'], ['name' => 'Waw'],
            ],

            'Magwe' => [
                ['name' => 'Magway'], ['name' => 'Taungdwingyi'],
                ['name' => 'Myothit'], ['name' => 'Natmauk'],
            ],

            'Sittwe' => [
                ['name' => 'Pauktaw'], ['name' => 'Ponnagyun'],
                ['name' => 'Rathedaung'], ['name' => 'Sittwe'],
            ],

            'Mawlamyine' => [
                ['name' => 'Mawlamyine'], ['name' => 'Chaungzon'],
                ['name' => 'Kyaikmaraw'], ['name' => 'Mudon'],
                ['name' => 'Thanbyuzayat'],
            ],

            'Hpa-An' => [
                ['name' => 'Hpa-An'], ['name' => 'Hlaingbwe'],
            ],

            'Myitkyina' => [
                ['name' => 'Myitkyina'], ['name' => 'Injangyang'],
                ['name' => 'Waingmaw'],
            ],

            'Dawei' => [
                ['name' => 'Dawei'], ['name' => 'Myitta'],
                ['name' => 'Launglon'], ['name' => 'Thayetchaung'],
                ['name' => 'Yebyu'], ['name' => 'Kaleinaung'],
            ],

            'Hakha' => [
                ['name' => 'Hakha'], ['name' => 'Thantlang'],
            ],

            'Loikaw' => [
                ['name' => 'Loikaw'], ['name' => 'Shadaw'],
            ],

            'Hopang' => [
                ['name' => 'Hopang'], ['name' => 'Namtit'],
                ['name' => 'Panlong'], ['name' => 'Mongmao'],
                ['name' => 'Pangwaun'],
            ],

            'Pindaya' => [
                ['name' => 'Pindaya'], ['name' => 'Ywangan'],
            ],

            'Laukkai' => [
                ['name' => 'Laukkai'], ['name' => 'Chinshwehaw'],
                ['name' => 'Konkyan'], ['name' => 'Mawhtike'],
            ],

            'Lahe' => [
                ['name' => 'Lahe'], ['name' => 'Leshi'], ['name' => 'Nanyun'],
            ],

            'Namhsan' => [
                ['name' => 'Mantong'], ['name' => 'Namhsan'],
            ],
        ];

        foreach ($myanmar_city_townships as $cityName => $townships) {

            if (!isset($cityIds[$cityName])) {
                continue;
            }

            $cityId = $cityIds[$cityName];

            foreach ($townships as $township) {
                DB::table('townships')->updateOrInsert(
                    [
                        'name' => $township['name'],
                        'city_id' => $cityId,
                    ],
                    [
                        'name' => $township['name'],
                        'city_id' => $cityId,
                    ]
                );
            }
        }

        echo "Locations seeded successfully.\n";
    }
}