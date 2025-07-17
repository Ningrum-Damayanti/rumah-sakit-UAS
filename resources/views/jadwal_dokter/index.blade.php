@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1 class="text-xl font-bold text-center w-full">Data Jadwal Dokter</h1>
</div>
<div class="section-body">
    <div class="card">
        <div class="card-body">

         {{-- Tombol Tambah Jadwal --}}
<div class="mb-4">
    <a href="{{ route('jadwal_dokters.create') }}"
       class="inline-block bg-green-600 hover:bg-green-700 text-white text-sm font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
        + Tambah Jadwal
    </a>
</div>



            <div class="table-responsive">
                <table class="table table-striped" id="table-jadwal">
                    <thead>
                        <tr>
                            <th>Dokter</th>
                            <th>Poli</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jadwals as $j)
                        <tr>
                            <td>{{ $j->dokter->name ?? '-' }}</td>
                            <td>{{ $j->poli }}</td>
                            <td>{{ $j->hari }}</td>
                            <td>{{ $j->jam_mulai }}</td>
                            <td>{{ $j->jam_selesai }}</td>
                            <td class="text-center">
                                <a href="{{ route('jadwal_dokters.edit', $j->id) }}"
                                   class="text-blue-500 hover:underline mr-2">Edit</a>
                                <form action="{{ route('jadwal_dokters.destroy', $j->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#table-jadwal').DataTable({
            responsive: true,
            autoWidth: false,
        });
    });
</script>
@endpush
