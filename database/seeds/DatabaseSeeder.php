<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PostSeeder::class);
        $this->call(PermissionSeeder::class);

        // DB::table('roles')->insert([
        //   ["name"=>"author"], 
        //   ["name"=>"editor"], 
        //   ["name"=>"publisher"], 
        //   ["name"=>"admin"]
        // ]
        // );
        DB::table('categories')->insert([
          ["name"=>"category1","slug"=>str_slug("category1")], 
          ["name"=>"category2","slug"=>str_slug("category2")], 
          ["name"=>"category3","slug"=>str_slug("category3")]
        ]
        );
        DB::table('tags')->insert([
          ["name"=>"tag1","slug"=>str_slug("tag1")], 
          ["name"=>"tag2","slug"=>str_slug("tag2")], 
          ["name"=>"tag3","slug"=>str_slug("tag3")]
        ]
        );
        DB::table('admins')->insert([
          ["name"=>"admin","email"=>"admin@gmail.com","password"=>bcrypt("admin"),
          "phone"=>"123","status"=>"1"]
        ]
        );
        
    }
}
