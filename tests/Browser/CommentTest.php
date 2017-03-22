<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CommentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreateComment () {
      /*  $this->browse(function ($browser) {
            $browser->loginAs(User::find(1))
                ->visit('/item/{id}/comment')
                ->type('title','CruddCo Page')
                ->type('url', 'http://cruddco.com')
                ->press('Submit')
                ->assertSee('CruddCo Page');
        }); */
    }
}
