<?php

namespace Modules\Book\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class BookDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \DB::table('books')->insert([
            'name' => 'Lord of the Rings the Fellowship of the Ring',
            'isbn' => '978-83-7181-510-2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        \DB::table('books')->insert([
            'name' => 'Harry Potter and the Philosopher\'s Stone',
            'isbn' => '978-3-16-148410-0',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
