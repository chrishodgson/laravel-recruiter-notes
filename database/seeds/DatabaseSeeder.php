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
        // create companies, recruiters each company and notes for each recruiter
        factory(App\Company::class, 3)
            ->create()
            ->each(function ($company) {
                /** @var $company App\Company */
                $company->recruiters()->createMany(
                    factory(App\Recruiter::class, 2)->make()->toArray()
                )->each(function ($recruiter) {
                    /** @var $recruiter App\Recruiter */
                    $recruiter->notes()->createMany(
                        factory(App\Note::class, 3)->make()->toArray()
                    );
                });
            });
    }
}
