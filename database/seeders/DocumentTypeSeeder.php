<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::create([
            'code' => '0',
            'name' => 'OTRO DOCUMENTO (COD 0)',
            'description' => 'DOC.TRIB.NO.DOM.SIN.RUC',
        ]);

        DocumentType::create([
            'code' => '1',
            'name' => 'D.N.I',
            'description' => 'DOC. NACIONAL DE IDENTIDAD',
        ]);

        DocumentType::create([
            'code' => '6',
            'name' => 'R.U.C',
            'description' => 'REG. UNICO DE CONTRIBUYENTES',
        ]);

        DocumentType::create([
            'code' => '4',
            'name' => 'CARNET DE EXTRANJERIA (COD 4)',
            'description' => 'CARNET DE EXTRANJERIA',
        ]);
    }
}
