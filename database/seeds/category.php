<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->delete();
        DB::table('category')->insert([
            //  ['id'=>1,'name'=>'Nam','parent'=>0],
            //  ['id'=>2,'name'=>'Áo Nam','parent'=>1],
            //  ['id'=>3,'name'=>'Quần Nam','parent'=>1],
            //  ['id'=>4,'name'=>'Áo Nam 2018','parent'=>2],
            //  ['id'=>5,'name'=>'Nu','parent'=>0],
            // ['id'=>6,'name'=>'Áo Nữ','parent'=>5],
            // ['id'=>7,'name'=>'Quần Nữ','parent'=>5],
            // ['id'=>8,'name'=>'Sản phẩm mới','parent'=>0],
            //  ['id'=>9,'name'=>'Linh kiện máy lọc nước ','parent'=>0]
            ['id'=>1,'name'=>'Máy lọc nước Sakumin','parent'=>0],
            ['id'=>2,'name'=>'Máy lọc nước Lucifer','parent'=>0],
            ['id'=>3,'name'=>'Máy lọc nước cây nóng lạnh','parent'=>0],
            ['id'=>4,'name'=>'Linh kiện máy lọc nước ','parent'=>0],
        ]);
    }
}
