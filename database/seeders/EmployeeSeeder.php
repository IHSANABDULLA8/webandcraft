<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(['name'=>"Maguire","email"=>"maguire@gmail.com","photo"=>"Maguire1.png","designation_id"=>9,"password"=>"17eriugaM9pWd281"]);
        DB::table('employees')->insert(['name'=>"De Gea","email"=>"degea@gmail.com","photo"=>"De Gea2.png","designation_id"=>8,"password"=>"15aeGeD7pWd341"]);
        DB::table('employees')->insert(['name'=>"Jesus","email"=>"jesus@gmail.com","photo"=>"Jesus3.png","designation_id"=>7,"password"=>"15suseJ8pWd401"]);
        DB::table('employees')->insert(['name'=>"Sterling","email"=>"sterling@gmail.com","photo"=>"Sterling4.png","designation_id"=>6,"password"=>"18gnilretS6pWd461"]);
        DB::table('employees')->insert(['name'=>"Gundogon","email"=>"gundogon@gmail.com","photo"=>"Gundogon5.png","designation_id"=>5,"password"=>"18nogodnuG5pWd52"]);
        DB::table('employees')->insert(['name'=>"De Bruyne","email"=>"debruyne@gmail.com","photo"=>"De Bruyne6.png","designation_id"=>4,"password"=>"18enyurBeD4pWd641"]);
        DB::table('employees')->insert(['name'=>"Firmino","email"=>"firmino@gmail.com","photo"=>"Firmino7.png","designation_id"=>3,"password"=>"17onimriF3pWd761"]);
        DB::table('employees')->insert(['name'=>"Mane","email"=>"mane@gmail.com","photo"=>"Mane8.png","designation_id"=>2,"password"=>"14enaM2pWd821"]);
        DB::table('employees')->insert(['name'=>"Jones","email"=>"jones@gmail.com","photo"=>"Jones9.png","designation_id"=>2,"password"=>"15senoJ2pWd881"]);
        DB::table('employees')->insert(['name'=>"Henderson","email"=>"henderson@gmail.com","photo"=>"Henderson10.png","designation_id"=>1,"password"=>"19nosredneH1pWd001"]);
        DB::table('employees')->insert(['name'=>"Gomez","email"=>"gomez@gmail.com","photo"=>"Gomez11.png","designation_id"=>7,"password"=>"15zemoG7pWd061"]);
        DB::table('employees')->insert(['name'=>"Van Dijk","email"=>"vandijk@gmail.com","photo"=>"Van Dijk12.png","designation_id"=>8,"password"=>"17kjiDnaV8pWd121"]);
        DB::table('employees')->insert(['name'=>"Salah","email"=>"salah@gmail.com","photo"=>"Salah13.png","designation_id"=>8,"password"=>"15halaS8pWd181"]);
        DB::table('employees')->insert(['name'=>"Alisson","email"=>"alisson@gmail.com","photo"=>"Alisson14.png","designation_id"=>9,"password"=>"17nossilA9pWd301"]);
        DB::table('employees')->insert(['name'=>"Alonso","email"=>"alonso@gmail.com","photo"=>"Alonso15.png","designation_id"=>9,"password"=>"16osnolA9pWd361"]);
        DB::table('employees')->insert(['name'=>"Rudiger","email"=>"rudiger@gmail.com","photo"=>"Rudiger16.png","designation_id"=>9,"password"=>"17regiduR9pWd421"]);
        DB::table('employees')->insert(['name'=>"Mendy","email"=>"mendy@gmail.com","photo"=>"Mendy17.png","designation_id"=>9,"password"=>"15ydneM9pWd481"]);

    }
}
