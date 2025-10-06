<?php

namespace App\Livewire\User;

use App\Models\Laporan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardUser extends Component
{
    public $totalLaporan;
    public $laporanPerBulan;
    public $laporanPending;

    public function mount()
    {
        //total laporan
        $this->totalLaporan = Laporan::where('user_id', Auth::user()->id)->count();

        //laporan pending
        $this->laporanPending = Laporan::where('user_id', Auth::user()->id)
            ->where('status', 'pending')
            ->count();

        //laporan per bulan
        $this->laporanPerBulan = Laporan::whereYear('tanggal', now()->year)
            ->get()
            ->groupBy(fn($item) => (int) Carbon::parse($item->getRawOriginal('tanggal'))->format('m'))
            ->map->count()
            ->toArray();

        $bulanLengkap = [];
        foreach (range(1, 12) as $bulan) {
            $bulanLengkap[] = $this->laporanPerBulan[$bulan] ?? 0;
        }

        $this->laporanPerBulan = $bulanLengkap;
    }

    public function render()
    {
        return view('livewire.user.dashboard-user', [
            'laporanDiproses' => Laporan::where('status', 'diproses')
                ->where('user_id', Auth::user()->id)
                ->count(),
            'laporanSelesai' => Laporan::where('status', 'selesai')
                ->where('user_id', Auth::user()->id)
                ->count(),
        ]);
    }
}
