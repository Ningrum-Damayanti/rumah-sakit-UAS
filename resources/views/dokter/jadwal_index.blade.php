@extends('layouts.app')

@section('title', 'Jadwal Saya')

@section('content')
<div class="container">
    <h2 class="mb-4">Jadwal Saya</h2>

    <div class="table-responsive">
        <table id="jadwalTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Poli</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jadwals as $jadwal)
                    <tr>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->jam_mulai }}</td>
                        <td>{{ $jadwal->jam_selesai }}</td>
                        <td>{{ $jadwal->poli ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Belum ada jadwal</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#jadwalTable').DataTable();
    });
</script>
@endsection
