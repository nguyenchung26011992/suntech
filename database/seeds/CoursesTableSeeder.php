<?php

use App\Entities\Course;
use App\Entities\User;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user      = User::where('email', 'admin@suntech.com')->first();
        $lecturer1 = User::where('email', 'lecturer1@suntech.com')->first();
        $lecturer2 = User::where('email', 'lecturer2@suntech.com')->first();
        $lecturer3 = User::where('email', 'lecturer3@suntech.com')->first();

        $courses = [
            [
                'title'       => 'Software Training',
                'image'       => '/assets/images/courses/course_1.jpg',
                'price'       => 130,
                'author_id'   => $user->id,
                'lecturer_id' => $lecturer1->id,
                'content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            ],
            [
                'title'       => 'Developing Mobile Apps',
                'image'       => '/assets/images/courses/course_1.jpg',
                'price'       => 0,
                'author_id'   => $user->id,
                'lecturer_id' => $lecturer2->id,
                'content'     => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            ],
            [
                'title'        => 'Starting a Startup',
                'image'        => '/assets/images/courses/course_1.jpg',
                'origin_price' => 320,
                'price'        => 220,
                'author_id'    => $user->id,
                'lecturer_id'  => $lecturer3->id,
                'content'      => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            ],
        ];

        foreach ($courses as $item) {
            $item['slug'] = str_slug($item['title']);

            $course = Course::updateOrCreate([
                'slug' => $item['slug'],
            ], $item);

            $course->status = Course::STATUS_ACTIVE;
            $course->save();
        }
    }
}
