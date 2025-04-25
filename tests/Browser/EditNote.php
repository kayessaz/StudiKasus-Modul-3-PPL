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
    public function NoteTest(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
            ->clickLink(link:'Notes')
            ->assertPathIs(path: '/Notes')
            ->press(button:'Create Note')
            ->type(field:'title', value: 'judul note')
            ->type(field:'description', value: 'description')
            ->press(button: 'CREATE')
            ->clickLink(link:'Edit')
            ->assertPathIs(path: '/Edit')
            ->type(field:'title', value: 'revisi judul note')
            ->type(field:'description', value: 'description')
            ->press(button: 'UPDATE')
            ;
        });
    }
}
