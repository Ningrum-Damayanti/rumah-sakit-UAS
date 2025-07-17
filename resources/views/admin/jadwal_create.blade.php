@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Tambah Jadwal Dokter</h1>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
  </div>
@endif

<form action="{{ route('jadwal-dokter.store') }}" method="POST">
  @csrf

  <div class="form-group">
    <label>Nama Dokter</label>
    <select name="dokter_id" class="form-control" required>
      <option value="">-- Pilih Dokter --</option>
      @foreach($dokters as $dokter)
        <option value="{{ $dokter->id }}">{{ $dokter->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    <label>Hari</label>
    <input type="text" name="hari" class="form-control" placeholder="Contoh: Senin" required>
  </div>

  <div class="form-group">
    <label>Jam Mulai</label>
    <input type="time" name="jam_mulai" class="form-control" required>
  </div>

  <div class="form-group">
    <label>Jam Selesai</label>
    <input type="time" name="jam_selesai" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-success mt-3">Simpan</button>
</form>
@endsection
