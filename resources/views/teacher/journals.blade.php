@extends('layouts.tlayout.sidebar')

@section('content')

<main class="dashboard-content">
    <div class=".container-fluid px-3 px-lg-4 py-4">
      <div class="container-fluid py-4">

        <h3 class="mb-4">Jurnal Harian Siswa</h3>

        <div class="table-responsive">
            <div class="card-body">

                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Siswa</th>
                            <th>Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($journals as $journal)
                            <tr>
                                <td>{{ $journal->student?->user?->name ?? '-' }}</td>
                                <td>{{ $journal->date }}</td>
                                <td>{{ $journal->activity }}</td>
                                <td>{{ $journal->note }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Belum ada jurnal
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{ $journals->links() }}

            </div>
        </div>

    </div>
        
</div>

</main>





@endsection