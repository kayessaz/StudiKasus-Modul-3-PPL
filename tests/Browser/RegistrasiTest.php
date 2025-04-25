<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegistrasiTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     * 
     */
    
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise Application Development')
                    ->clickLink(link: 'Register')
                    ->assertPathIs(path: '/register')
                    ->type(field:'name', value: 'name')
                    ->type(field:'email', value: 'admin@gmail.com')
                    ->type(field:'password', value: 'password')
                    ->type(field:'password_confirmation', value: 'password')
                    ->press(button: 'REGISTER');

        });
    }
}
