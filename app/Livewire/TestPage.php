<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout; // <-- TAMBAHKAN 'use' INI

// V-- TAMBAHKAN ATRIBUT INI untuk memberitahu Livewire agar menggunakan layout admin kita
#[Layout('components.admin-layout')]
class TestPage extends Component
{
    public $pesan = '';

    // KEMBALIKAN method render ke bentuk standar yang memanggil file view
    public function render()
    {
        return view('livewire.test-page');
    }
}