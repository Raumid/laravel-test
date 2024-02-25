<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Excel;

class InitialSchemaSeeder extends Seeder
{

    protected $recordsPath = __DIR__.'/../records';
    protected $nameFile = 'DBG3DATABASETEST';
    protected $extension = '.xlsx';
    protected $data = null;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedCustomers();

        $this->seedEmployees();

        $this->seedProductCategory();

        $this->seedProducts();

        $this->seedMovements();

        $this->seedExample();
    }

    protected function seedCustomers() {
        if(DB::table('customers')->count()) return;

        DB::table('customers')->insert($this->getSeedRecordsJSON('customers'));
    }

    protected function seedEmployees() {
        if(DB::table('employees')->count()) return;

        DB::table('employees')->insert($this->getSeedRecordsJSON('employees'));
    }

    protected function seedProductCategory() {
        if(DB::table('product_category')->count()) return;

        DB::table('product_category')->insert($this->getSeedRecordsJSON('productCategory'));
    }

    protected function seedProducts() {
        if(DB::table('products')->count()) return;

        DB::table('products')->insert($this->getSeedRecordsJSON('products'));
    }

    protected function seedMovements() {
        if(DB::table('types_movements')->count()) return;

        DB::table('types_movements')->insert($this->getSeedRecordsJSON('movements'));
    }

    protected function seedExample() {
        if(DB::table('transactions')->count()) return;

        DB::table('transactions')->insert($this->getSeedRecordsJSON('dataexample'));
    }

    protected function getSeedRecordsJSON($name)
    {
        return json_decode(file_get_contents($this->recordsPath.'/'.$name.'.json'), true);
    }

    protected function getSeedRecords()
    {
        return Excel::toArray([], $this->recordsPath.'/'.$this->nameFile.$this->extension);
    }
    
}
