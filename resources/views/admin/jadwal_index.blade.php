@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Jadwal Dokter</h1>
</div>

<div class="mb-3">
  <a href="{{ route('jadwal-dokter.create') }}" class="btn btn-primary">Tambah Jadwal</a>
</div>

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
  <table class="table table-striped" id="datatable">
    <thead>
      <tr>
        <th>Dokter</th>
        <th>Hari</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jadwals as $jadwal)
        <tr>
          <td>{{ $jadwal->dokter->name }}</td>
          <td>{{ $jadwal->hari }}</td>
          <td>{{ $jadwal->jam_mulai }}</td>
          <td>{{ $jadwal->jam_selesai }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
    $('#datatable').DataTable();
  });
</script>
@endpush
