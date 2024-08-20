<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\PartnerBranch;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_superadmin = User::create([
            'name' => 'Super Admin User',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin')
        ])->syncRoles(['Super Admin']);

        $partner = Partner::create([
            'document_type_code' => '0',
            'document_number' => '00000000000',
            'business_name' => 'IZY DEV',
            'trade_name' => 'IZY RESTAURANT',
            'email' => 'izydev@gmail.com',
        ]);

        $user = User::create([
            'name' => 'Admin Izy',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'partner_id' => $partner->id,
            'partner_main_user'=>1
        ])->syncRoles(['admin']);

        $branch = PartnerBranch::create([
            'partner_id' => $partner->id,
            'name' => 'Izy Cix ',
            'address' => 'Av. 28 de Julio 123',
            'website' => 'izycix.pe',
        ]);

    }
}
