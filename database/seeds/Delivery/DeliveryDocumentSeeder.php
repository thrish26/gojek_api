<?php

use Illuminate\Database\Seeder;

class DeliveryDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($company = null)
    {
        Schema::disableForeignKeyConstraints();

        DB::table('documents')->insert([
            ['company_id' => $company, 'service' => 'DELIVERY','name' =>'License','type' =>'DELIVERY','file_type' =>'image','is_backside' =>1,'is_expire' =>1,'status' =>1]        
        ]);
        
        Schema::enableForeignKeyConstraints();
    }
}
