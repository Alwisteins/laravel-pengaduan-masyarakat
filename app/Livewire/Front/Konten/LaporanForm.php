<?php

namespace App\Livewire\Front\Konten;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.front')]
class LaporanForm extends Component
{
    public function render()
    {
        return view('livewire.front.konten.laporan-form');
    }
}
