<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     * 
     */
    
    public function registrasiTest(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise Application Development')
                    ->clickLink(link: 'Log in')
                    ->assertPathIs(path: '/Log in')
                    ->type(field:'email', value: 'admin@gmail.com')
                    ->type(field:'password', value: 'password')
                    ->check(field:'Remember me', value:'remember me')
                    ->press(button: 'LOG IN')
                    ->assertPathIs(path: '/dashboard');


        });
    }
}
