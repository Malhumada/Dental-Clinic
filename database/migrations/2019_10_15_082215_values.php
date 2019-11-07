<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class Values extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::insert('insert into users (name, password, email, email_verified_at,role, role_name) values (?,?, ?, ?, ?, ?)', ['admin', Hash::make('admin') , 'admin@admin.com' , date("Y-m-d h:i:s"), '1', 'admin']);
   
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['footer', 'copyright', 'SoftEngine']);
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['visitors', '0', '0']);
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['navbar', '#ffffff', '#408080']);
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['site_name', 'SoftEngine', 'SoftEngine']);
   
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['banner', 'location', 'Earth']);
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['banner', 'open_hours', '10:00 AM - 10:00 PM 24/7']);
        DB::insert('insert into settings (set_name, set_value, set_code) values (?, ?, ?)', ['banner', 'mobile', '123456789']);


        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
