@extends('front.layout.main_front')

@section('content')
<div class="container mt-5 mb-5">
    <h2 class="text-2xl font-bold mb-4 text-center">Visi & Misi</h2>
    
    <div class="bg-white px-5 py-6 rounded shadow md:px-6 lg:px-8">
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-3">Visi</h3>
            <p class="text-justify">
                Menjadi Rumah Sakit unggulan yang profesional, bermutu, dan terpercaya di wilayah pelayanan.
            </p>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-3">Misi</h3>
            <ul class="list-disc pl-6 space-y-2 text-justify">
                <li>Menyelenggarakan pelayanan kesehatan yang bermutu dan terjangkau.</li>
                <li>Meningkatkan profesionalisme dan kompetensi SDM.</li>
                <li>Memberikan pelayanan yang cepat, tepat, dan ramah.</li>
            </ul>
        </div>
    </div>
</div>
@endsection
