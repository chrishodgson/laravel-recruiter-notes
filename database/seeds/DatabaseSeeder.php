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
        $userId = factory(App\User::class)->create()->id;

        // create companies, recruiters for those companies and notes for those recruiters
        factory(App\Company::class, 3)
            ->create(['user_id' => $userId])
            ->each(function ($company) use($userId) {
                /** @var $company App\Company */
                $company->recruiters()->createMany(
                    factory(App\Recruiter::class, 2)->make(['user_id' => $userId])->toArray()
                )->each(function ($recruiter) use($userId) {
                    /** @var $recruiter App\Recruiter */
                    $recruiter->notes()->createMany(
                        factory(App\Note::class, 3)->make(['user_id' => $userId])->toArray()
                    );
                });
            });
    }
}
