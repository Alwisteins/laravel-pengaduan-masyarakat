<?php

namespace App\Livewire\Admin;

use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $totalLaporan;

    public function mount()
    {
        $this->totalLaporan = Laporan::count();
    }

    public function render()
    {
        return view('livewire.admin.dashboard-admin', [
            'laporanPending' => Laporan::where('status', 'pending')->count(),
            'laporanDiproses' => Laporan::where('status', 'diproses')->count(),
            'laporanSelesai' => Laporan::where('status', 'selesai')->count(),
        ]);
    }
}
