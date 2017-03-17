<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
                $browser->visit('/')
                ->assertSee(config('app.name'));
        });
    }
}
