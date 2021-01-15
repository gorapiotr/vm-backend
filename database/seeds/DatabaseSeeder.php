<?php

use Illuminate\Database\Seeder;
use Modules\Book\Database\Seeders\BookDatabaseSeeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                Modules\Book\Database\Seeders\BookDatabaseSeeder::class,
                Modules\Category\Database\Seeders\CategoryDatabaseSeeder::class
            ]
        );
    }
}
