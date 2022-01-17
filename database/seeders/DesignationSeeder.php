<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        DB::table('designations')->insert(['title'=>"Chief Executive Officer"]);
        DB::table('designations')->insert(['title'=>"Chief Legal Officer"]);
        DB::table('designations')->insert(['title'=>"Chief Marketing Officer"]);
        DB::table('designations')->insert(['title'=>"Chief Technology Officer"]);
        DB::table('designations')->insert(['title'=>"Chief Financial Officer"]);
        DB::table('designations')->insert(['title'=>"Chief Operating Officer"]);
        DB::table('designations')->insert(['title'=>"Assistant"]);
        DB::table('designations')->insert(['title'=>"Manager"]);
        DB::table('designations')->insert(['title'=>"Clerk"]);
        
    }
}
