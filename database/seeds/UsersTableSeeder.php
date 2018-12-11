<?php

use App\Entities\Category;
use App\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use NF\Roles\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker\Generator();
        $faker->addProvider(new Faker\Provider\en_US\Person($faker));
        $faker->addProvider(new Faker\Provider\en_SG\Address($faker));
        $faker->addProvider(new Faker\Provider\en_US\Company($faker));
        $faker->addProvider(new Faker\Provider\DateTime($faker));
        $faker->addProvider(new Faker\Provider\Internet($faker));

        $adminRole    = Role::find(1);
        $lecturerRole = Role::find(2);

        $users = [
            'admin'   => [
                'first_name' => 'Admin',
                'last_name'  => '',
                'email'      => 'admin@suntech.com',
                'role'       => 'adminRole',
            ],
            'chungnd' => [
                'first_name' => 'Chung',
                'last_name'  => 'Nguyễn',
                'email'      => 'nguyenchung26011992@gmail.com',
                'role'       => 'adminRole',
            ],
        ];

        foreach ($users as $item) {
            $user_data = [
                'email'      => $item['email'],
                'first_name' => $item['first_name'],
                'last_name'  => $item['last_name'],
            ];

            $user = User::updateOrCreate([
                'email' => $item['email'],
            ], $user_data);

            $user->password = Hash::make('secret');
            $user->avatar   = '/assets/images/avatar.jpg';
            $user->status   = User::STATUS_ACTIVE;
            $user->save();
            $user->attachRole(${$item['role']});
        }

        $marketing = Category::where('slug', 'marketing-management')->first();
        $design    = Category::where('slug', 'designer-website')->first();
        $lecturers = [
            [
                'first_name' => 'Jacke',
                'last_name'  => 'Masito',
                'email'      => 'lecturer1@suntech.com',
                'avatar'     => '/assets/images/lecturers/team_1.jpg',
                'category'   => 'marketing',
            ],
            [
                'first_name' => 'William',
                'last_name'  => 'James',
                'email'      => 'lecturer2@suntech.com',
                'avatar'     => '/assets/images/lecturers/team_2.jpg',
                'category'   => 'marketing',
            ],
            [
                'first_name' => 'John',
                'last_name'  => 'Tyler',
                'email'      => 'lecturer3@suntech.com',
                'avatar'     => '/assets/images/lecturers/team_3.jpg',
                'category'   => 'design',
            ],
            [
                'first_name' => 'Veronica',
                'last_name'  => 'Vahn',
                'email'      => 'lecturer4@suntech.com',
                'avatar'     => '/assets/images/lecturers/team_4.jpg',
                'category'   => 'design',
            ],
        ];

        foreach ($lecturers as $item) {
            $user_data = [
                'email'      => $item['email'],
                'first_name' => $item['first_name'],
                'last_name'  => $item['last_name'],
                'avatar'     => $item['avatar'],
            ];

            $user = User::updateOrCreate([
                'email' => $item['email'],
            ], $user_data);

            $user->password = Hash::make('secret');
            $user->status   = User::STATUS_ACTIVE;
            $user->save();
            $user->attachRole(${'lecturerRole'});

            $user->categories()->attach(${$item['category']}->id);
        }
    }
}
