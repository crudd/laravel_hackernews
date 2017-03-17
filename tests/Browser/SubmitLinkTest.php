<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SubmitLinkTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use DatabaseMigrations;

    public function testWeSeeSubmitPage()
    {
        factory(User::class)->create([
            'email' => 'test@example.com',
        ]);
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                    ->visit('/submit')
                    ->assertSee('Submit A Link');
        });
    }
    
    public function testSubmitFormValidates () {
        factory(User::class)->create([
            'email' => 'test@example.com',
        ]);
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                ->visit('/submit')
                ->press('Submit')
                ->assertSee('The title field is required.')
                ->assertSee('The url field is required when text is not present.')
                ->assertSee('The text field is required when url is not present.');
        });
    }

    public function testSubmitLinksToDB () {
        factory(User::class)->create([
            'email' => 'test@example.com',
        ]);
        $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                ->visit('/submit')
                ->type('title','CruddCo Page')
                ->type('url', 'http://cruddco.com')
                ->press('Submit')
                ->assertSee('CruddCo Page');
        });
    }
}
