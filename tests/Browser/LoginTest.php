<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    public function testLogin(){
        $user = factory(User::class)->create([
            'email' => 'test@example.com',
        ]);
        
        $this->browse(function ($browser) use ($user){
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'secret')
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee('Dashboard');
        });
    }
}
