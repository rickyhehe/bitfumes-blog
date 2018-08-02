<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
          ["name"=>"post_create","for"=>"post"], 
          ["name"=>"post_read","for"=>"post"], 
          ["name"=>"post_update","for"=>"post"], 
          ["name"=>"post_delete","for"=>"post"], 
          ["name"=>"user_create","for"=>"user"], 
          ["name"=>"user_read","for"=>"user"], 
          ["name"=>"user_update","for"=>"user"], 
          ["name"=>"user_delete","for"=>"user"], 
          ["name"=>"tag_crud","for"=>"other"], 
          ["name"=>"category_crud","for"=>"other"]
        ]
        );
    }
}
