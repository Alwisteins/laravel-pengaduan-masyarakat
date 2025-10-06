<div>
    @auth
        @if (auth()->user()->role == 'user')
            <div class="text-center">
                <a href="{{ route('user.laporan.create') }}" class="btn btn-primary">Buat Laporan</a>
            </div>
            <livewire:user.create-laporan />
        @else
            anda admin, tidak perlu membuat laporan
        @endif
    @else
        <a href="{{ route('login') }}" class="btn btn-primary">Login untuk membuat laporan</a>
    @endauth
</div>
