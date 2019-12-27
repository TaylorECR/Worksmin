<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Role::class, 1)->create(['name' => 'admin']);
        factory(App\Role::class, 1)->create(['name' => 'candidate']);
        factory(App\Role::class, 1)->create(['name' => 'company']);

        factory(App\Category::class, 1)->create(['icon' => 'fa-briefcase']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-pencil-square-o']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-cutlery']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-code']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-bar-chart']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-pencil']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-graduation-cap']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-bullhorn']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-briefcase']);
        factory(App\Category::class, 1)->create(['icon' => 'fa-pencil-square-o']);

        factory(App\Sector::class, 10)->create();

        factory(App\Department::class, 24)->create();

        factory(App\Province::class, 50)->create();

        factory(App\Skill::class, 20)->create();

        factory(App\Language::class, 5)->create();

        factory(App\Subcategory::class, 30)->create();

        factory(App\JobType::class, 1)->create(['job_type' => 'Medio tiempo']);
        factory(App\JobType::class, 1)->create(['job_type' => 'Tiempo completo']);
        factory(App\JobType::class, 1)->create(['job_type' => 'Por horas']);


        Storage::deleteDirectory('users');
        Storage::makeDirectory('users');

        factory(App\User::class, 1)->create([
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => App\Role::ADMIN,
        ])
        ->each(function(App\User $u){
            factory(App\Candidate::class, 1)->create(['user_id' => $u->id, 'name' => $u->name]); 
        });

        factory(App\User::class, 1)->create([
            'email' => 'candidate@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => App\Role::CANDIDATE,
        ])
        ->each(function(App\User $u){
            factory(App\Candidate::class, 1)->create(['user_id' => $u->id, 'name' => $u->name]); 
        });

        factory(App\User::class, 20)->create()
        ->each(function(App\User $u){
            factory(App\Candidate::class, 1)->create(['user_id' => $u->id, 'name' => $u->name]); 
        });

        factory(App\User::class, 1)->create([
            'email' => 'company@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => App\Role::COMPANY,
        ])
        ->each(function(App\User $u){
            factory(App\Company::class, 1)->create(['user_id' => $u->id, 'title' => $u->name]); 
        });

        factory(App\User::class, 10)->create([
            'role_id' => App\Role::COMPANY,
        ])
        ->each(function(App\User $u){
            factory(App\Company::class, 1)->create(['user_id' => $u->id, 'title' => $u->name]);  
        });

        factory(App\Job::class, 100)->create();

        factory(App\Education::class, 60)->create();
        factory(App\WorkExperience::class, 70)->create();

        Storage::deleteDirectory('files');
        Storage::makeDirectory('files');
    }
}
