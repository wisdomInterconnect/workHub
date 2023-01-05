<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\listing;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //   \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'Okon Ifiok',
            'email' => 'okonifi@gmail.com'

        ]);
          listing::factory(6)->create([
            'user_id' => $user->id
          ]);

          // listing::create([
          //   'title' => 'Laravel senior Developer',
          //   'tags' => 'Laravel, javascript',
          //   'company' => 'Acme Corp',
          //   'location' => 'Boston, MA',
          //   'email' => 'okonifi@gmail.com',
          //   'website' => 'https://www.acme.com',
          //   'description' => 'Laravel senior Developer ia lond programming',
          // ]);

        //   listing::create([
        //     'title' => 'Full-Stack Developer',
        //     'tags' => 'Laravel, javascript',
        //     'company' => 'Microsoft',
        //     'location' => 'Boston, MA',
        //     'email' => 'okonifi@gmail.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'FullStack senior Developer ia lond programming',
        //   ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
