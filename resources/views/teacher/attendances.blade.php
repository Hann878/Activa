@extends('layouts.tlayout.sidebar')

@section('content')


<main class="dashboard-content">
    <div class=".container-fluid px-3 px-lg-4 py-4">

        <div class="container-fluid py-4">

            <h3 class="mb-4">Data Absensi Siswa</h3>

            <div class="table-responsive">
                <div class="card-body">

                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>Tanggal</th>
                                <th>Jam Absen</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->student?->user?->name ?? '-' }}</td>
                                    <td>{{ $attendance->date }}</td>
                                    <td>{{ $attendance->check_in_time ?? '-' }}</td>
                                    <td>{{ $attendance->status }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        Belum ada data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $attendances->links() }}

                </div>
            </div>

        </div>
    </div>
</main>





@endsection