@section('title', 'Laporan')
@section('css')
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
@endsection
@section('js')
    <script src="mazer/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="mazer/assets/static/js/pages/simple-datatables.js"></script>
@endsection

<div>
    <div class="page-heading">
        <h3>Laporan</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Simple Datatable
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul Laporan</th>
                            <th>Pelapor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporans as $laporan)
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>{{ $laporan->judul }}</td>
                                <td>{{ $laporan->user->name }}</td>
                                <td>
                                    <span
                                        class="badge {{ $laporan->status === 'Selesai' ? 'bg-success' : ($laporan->status === 'Diproses' ? 'bg-warning' : 'bg-danger') }}">
                                        {{ $laporan->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
