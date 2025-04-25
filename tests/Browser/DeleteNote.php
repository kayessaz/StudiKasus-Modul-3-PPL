<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNote extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group notes
     */
    public function testDeleteNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Modul 3')
                ->clickLink('Log in')
                ->assertPathIs('/login')
                ->type('email', 'admin@gmail.com')
                ->type('password', 'password')
                ->press('LOG IN')
                ->assertPathIs('/dashboard')
                ->clickLink('Notes')
                ->assertPathIs('/notes')
                ->assertSee('Notes')
                ->press('Delete') // tombol Delete 
                ->assertSee('Note has been deleted'); // Muncul notifikasi "Note has been deleted"
        });
    }
}