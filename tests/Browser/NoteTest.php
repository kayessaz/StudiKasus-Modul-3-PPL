<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NoteTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function LoginTest(): void
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
            ->assertPathIs(path: '/dashboard')
            ->clickLink(link:'Notes')
            ->assertPathIs(path: '/Notes')
            ->press(button:'Create Note')
            ->type(field:'title', value: 'judul note')
            ->type(field:'description', value: 'description')
            ->press(button: 'CREATE');
        });
    }
}
