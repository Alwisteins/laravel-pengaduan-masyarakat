<?php

namespace App\Livewire\User;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardUser extends Component
{
    public $totalLaporan;

    public function mount()
    {
        $this->totalLaporan = Laporan::where('user_id', Auth::user()->id)->count();
    }

    public function render()
    {
        return view('livewire.user.dashboard-user', [
            'laporanPending' => Laporan::where('status', 'pending')
                ->where('user_id', Auth::user()->id)
                ->count(),
            'laporanDiproses' => Laporan::where('status', 'diproses')
                ->where('user_id', Auth::user()->id)
                ->count(),
            'laporanSelesai' => Laporan::where('status', 'selesai')
                ->where('user_id', Auth::user()->id)
                ->count(),
        ]);
    }
}
