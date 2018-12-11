<?php

use App\Entities\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [

                'name' => 'Marketing & Management',
                'slug' => str_slug('Marketing & Management'),
            ],
            [

                'name' => 'Designer & Website',
                'slug' => str_slug('Designer & Website'),
            ],
        ];

        foreach ($categories as $item) {
            $category         = new Category;
            $category->name   = $item['name'];
            $category->slug   = $item['slug'];
            $category->status = Category::STATUS_ACTIVE;
            $category->save();
        }
    }
}
