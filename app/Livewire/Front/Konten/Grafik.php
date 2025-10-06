<?php

namespace App\Livewire\Front\Konten;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Laporan;
use App\Models\User;
use Carbon\Carbon;

#[Layout('components.layouts.front')]
class Grafik extends Component
{

    public $totalLaporan;
    public $laporanPending;
    public $laporanProses;
    public $laporanSelesai;
    public $laporanPerBulan;
    public $userStats = [];

    // protected $listeners = [
    //     'laporanCreated' => 'mount',
    //     'laporanUpdated' => 'mount',
    //     'laporanDeleted' => 'mount',
    // ];

    public function mount()
    {
        // Laporan statistics
        $this->totalLaporan = Laporan::count();
        $this->laporanPending = Laporan::where('status', 'pending')->count();
        $this->laporanProses = Laporan::where('status', 'diproses')->count();
        $this->laporanSelesai = Laporan::where('status', 'selesai')->count();
        $this->laporanPerBulan = Laporan::where('status', 'selesai')->count();

        $this->laporanPerBulan = Laporan::whereYear('tanggal', now()->year)
            ->get()
            ->groupBy(function ($item) {
                return Carbon::parse($item->getRawOriginal('tanggal'))->format('m');
            })
            ->map->count()
            ->toArray();
    }

    public function render()
    {
        return view('livewire.front.konten.grafik');
    }
}
