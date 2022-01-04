<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Quentin',
            'last_name' => 'CATHERINE',
            'email' => 'hello@kapouet.fr',
        ]);
        User::factory(49)->create();
        User::factory(50)->unverified()->create();
    }
}
