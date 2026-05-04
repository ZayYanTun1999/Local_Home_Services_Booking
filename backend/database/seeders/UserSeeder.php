<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Services\MyanmarNameGenerator;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $generator = new MyanmarNameGenerator();

        $townshipIds = DB::table('townships')->pluck('id')->toArray();

        if (empty($townshipIds)) {
            $this->command->error("No townships found!");
            return;
        }

        $now = now();
        $users = [];

        // =========================
        // ADMIN
        // =========================
        $users[] = [
            'name' => 'System Admin',
            'email' => 'admin@example.com',
            'phone' => '09000000000',
            'password' => bcrypt('password'),
            'gender' => 'other',
            'role' => 'admin',
            'home_no' => 1,
            'street' => 'Admin Street',
            'ward' => 'Admin Ward',
            'township_id' => $townshipIds[array_rand($townshipIds)],
            'status' => 'active',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        // =========================
        // 20 SERVICE PROVIDERS (MALE + FEMALE MIXED)
        // =========================
        for ($i = 0; $i < 20; $i++) {

            $gender = rand(0, 1) ? 'male' : 'female';

            $name = $generator->generate($gender, 1)[0];

            $users[] = $this->makeUser($name, $gender, 'service_provider', $townshipIds, $now);
        }

        // =========================
        // 20 CUSTOMERS (MALE + FEMALE MIXED)
        // =========================
        for ($i = 0; $i < 20; $i++) {

            $gender = rand(0, 1) ? 'male' : 'female';

            $name = $generator->generate($gender, 1)[0];

            $users[] = $this->makeUser($name, $gender, 'customer', $townshipIds, $now);
        }

        DB::table('users')->insert($users);

        $this->command->info("Users seeded successfully using Gender-Aware Myanmar Generator!");
    }

    // =========================
    // CREATE USER
    // =========================
    private function makeUser(
        string $name,
        string $gender,
        string $role,
        array $townshipIds,
        $now
    ): array {
        return [
            'name' => $name,
            'email' => Str::slug($name) . rand(1000, 999999) . '@example.com',
            'phone' => '09' . rand(10000000, 99999999),
            'password' => bcrypt('password'),

            'gender' => $gender,
            'role' => $role,

            'home_no' => rand(1, 999),
            'street' => 'Street ' . rand(1, 50),
            'ward' => 'Ward ' . rand(1, 20),

            'township_id' => $townshipIds[array_rand($townshipIds)],

            'status' => 'active',

            'created_at' => $now,
            'updated_at' => $now,
        ];
    }
}