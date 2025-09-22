<?php

namespace App\Livewire\User;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LaporanUser extends Component
{
    public function render()
    {
        return view('livewire.user.laporan-user', [
            'laporans' => Laporan::where('user_id', Auth::user()->id)->get(),
        ]);
    }
}
