<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NoteTest extends DuskTestCase
{
    /**
     * Menguji alur melihat detail catatan (detail note) secara otomatis menggunakan Dusk.
     */
    public function testDetailNoteFlow(): void
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
                ->type('password', 'password')
                // 7. Menekan tombol 'LOG IN'.
                ->press('LOG IN')
                // 8. Memastikan setelah login, berada di '/dashboard'.
                ->assertPathIs('/dashboard')
                // 9. Memastikan teks 'Dashboard' terlihat.
                ->assertSee('Dashboard')
                // 10. Klik link 'Notes'.
                ->clickLink('Notes')
                // 11. Memastikan berada di halaman '/notes'.
                ->assertPathIs('/notes')
                // 12. Memastikan teks 'Notes' terlihat.
                ->assertSee('Notes');

            // 13. Asumsi: Sudah ada catatan yang dibuat sebelumnya. Kita akan mencari link detail catatan.
            //    Kode ini mengklik elemen yang mengandung teks "Edit".
            $browser->clickLink('Edit')
                // 14. Memastikan kita berada di halaman detail catatan.  Verifikasi breadcrumb.
                ->assertSee('Notes / Edit')
                // 15. Memastikan judul catatan yang benar terlihat.
                ->assertSee('Edit')
                // 16. Memastikan nama penulis terlihat.
                ->assertSee('Author: admin')
                // 17. Memastikan isi catatan terlihat.
                ->assertSee('edit');
        });
    }
}
