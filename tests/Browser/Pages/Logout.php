<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class Logout extends DuskTestCase
{
    /**
     * Menguji alur logout pengguna secara otomatis menggunakan Dusk.
     */
    public function testLogoutFlow(): void
    {
        $this->browse(function (Browser $browser) {
            // 1. Mengunjungi halaman utama aplikasi.
            $browser->visit('/')
                // 2. Memastikan teks 'Modul 3' ada di halaman.
                ->assertSee('Modul 3')
                // 3. Mengklik link 'Log in'.
                ->clickLink('Log in')
                // 4. Memastikan berada di halaman '/login'.
                ->assertPathIs('/login')
                // 5. Mengisi email dengan 'admin@gmail.com'.
                ->type('email', 'admin@gmail.com')
                // 6. Mengisi password dengan '123456'.
                ->type('password', '123456')
                // 7. Menekan tombol 'LOG IN'.
                ->press('LOG IN')
                // 8. Memastikan setelah login, berada di '/dashboard'.
                ->assertPathIs('/dashboard')
                // 9. Memastikan teks 'Dashboard' terlihat.
                ->assertSee('Dashboard')
                // 10. Klik dropdown user.
                ->click('.relative')  // Sesuaikan selector ini dengan dropdown user Anda
                // 11. Klik link 'Log Out'.
                ->clickLink('Log Out')
                // 12. Memastikan diarahkan ke halaman beranda setelah logout.
                ->assertPathIs('/');
        });
    }
}