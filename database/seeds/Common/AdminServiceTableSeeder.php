<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($company = null)
    {
    	Schema::disableForeignKeyConstraints();

        DB::table('admin_services')->insert([
    		[
	            'admin_service' => 'TRANSPORT',
                'display_name' => 'TRANSPORT',
                'base_url' => 'http://127.0.0.1:8001/api/v1',
	            'status' => '1',
	            'company_id' => $company
	        ],
            [
                'admin_service' => 'ORDER',
                'display_name' => 'DELIVERIES',
                'base_url' => 'http://127.0.0.1:8001/api/v1',
                'status' => '1',
                'company_id' => $company
            ],
            [
                'admin_service' => 'SERVICE',
                'display_name' => 'SERVICE',
                'base_url' => 'http://127.0.0.1:8001/api/v1',
                'status' => '1',
                'company_id' => $company
            ],
            [
                'admin_service' => 'DELIVERY',
                'display_name' => 'DELIVERY',
                'base_url' => 'http://127.0.0.1:8001/api/v1',
                'status' => '1',
                'company_id' => $company
            ]
	    ]);

	    Schema::enableForeignKeyConstraints();
    }
}
