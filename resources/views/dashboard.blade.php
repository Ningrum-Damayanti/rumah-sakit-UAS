@extends('layouts.app')

@section('content')
<div class="section-header">
    <h1 class="text-xl font-bold text-center w-full">Dashboard Admin</h1>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="flex justify-center gap-4 flex-wrap mb-6">

                {{-- Tombol 1: Pendaftaran Pasien --}}
                <div class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                    hover:bg-green-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                    transform hover:scale-105 active:scale-95 cursor-pointer btn-menu text-center py-6" 
                    data-target="section-pasien">
                    <div class="flex flex-col items-center gap-2">
                        <i class="fas fa-user-plus text-3xl"></i>
                        <h4 class="text-lg font-semibold">Pendaftaran Pasien</h4>
                        <p class="text-sm">Lihat dan kelola pendaftaran</p>
                    </div>
                </div>

                {{-- Tombol 2: Kontak --}}
                <div class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                    hover:bg-green-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                    transform hover:scale-105 active:scale-95 cursor-pointer btn-menu text-center py-6" 
                    data-target="section-kontak">
                    <div class="flex flex-col items-center gap-2">
                        <i class="fas fa-phone text-3xl"></i>
                        <h4 class="text-lg font-semibold">Kontak</h4>
                        <p class="text-sm">Kelola informasi kontak</p>
                    </div>
                </div>

                {{-- Tombol 3: Jadwal Dokter --}}
                <div class="w-full md:w-1/4 bg-green-400 text-white rounded-lg shadow-md 
                    hover:bg-green-500 hover:shadow-xl transition-all duration-300 ease-in-out 
                    transform hover:scale-105 active:scale-95 cursor-pointer btn-menu text-center py-6" 
                    data-target="section-jadwal">
                    <div class="flex flex-col items-center gap-2">
                        <i class="fas fa-calendar-alt text-3xl"></i>
                        <h4 class="text-lg font-semibold">Jadwal Dokter</h4>
                        <p class="text-sm">Atur jadwal dan praktik</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>





            {{-- Data Pendaftaran Pasien --}}
            <div id="section-pasien" class="data-section" style="display: none;">
                <h5>Data Pendaftaran Pasien</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-pasien">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Keluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pasien as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->tanggal_lahir)->format('d-m-Y') }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->no_hp }}</td>
                                <td>{{ $p->keluhan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Data Kontak --}}
            <div id="section-kontak" class="data-section" style="display: none;">
                <h5>Data Kontak</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-kontak">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Komentar</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kontaks as $k)
                            <tr>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>{{ $k->komentar }}</td>
                                <td>{{ \Carbon\Carbon::parse($k->created_at)->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Data Jadwal Dokter --}}
            <div id="section-jadwal" class="data-section" style="display: none;">
                <h5>Data Jadwal Dokter</h5>
                <div class="table-responsive">
                    <table class="table table-striped" id="table-jadwal">
                        <thead>
                            <tr>
                                <th>Dokter</th>
                                <th>Poli</th>
                                <th>Hari</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#table-pasien').DataTable();
        $('#table-kontak').DataTable();
        $('#table-jadwal').DataTable();

        // Tampilkan section default
        $('#section-pasien').show();

        // Klik tombol menu
        $('.btn-menu').click(function () {
            const target = $(this).data('target');

            // Sembunyikan semua section
            $('.data-section').hide();

            // Tampilkan yang dipilih
            $('#' + target).fadeIn();
        });
    });
</script>
@endpush
