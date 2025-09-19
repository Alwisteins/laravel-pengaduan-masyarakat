<?php

namespace App\Livewire\Dashboard;

use App\Models\Laporan;
use Livewire\Component;

class Home extends Component
{
    public $totalLaporan;

    public function mount () {
        $this->totalLaporan = Laporan::count();
    }

    public function render()
    {
        return view('livewire.dashboard.home', [
            'laporanPending' => Laporan::where('status', 'pending')->count(),
            'laporanDiproses' => Laporan::where('status', 'diproses')->count(),
            'laporanSelesai' => Laporan::where('status', 'selesai')->count(),
        ]);
    }
}
