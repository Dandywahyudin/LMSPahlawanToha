<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peraturan Ujian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-bold mb-6 text-red-600">PERATURAN DAN TATA TERTIB UJIAN</h3>
                    
                    <div class="space-y-6">
                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold text-gray-800">1. Waktu Pengerjaan</h4>
                            <ul class="list-disc ml-6 mt-2 text-gray-700">
                                <li>Durasi ujian: <span class="font-medium">120 menit</span></li>
                                <li>Timer akan otomatis berjalan setelah token dimasukkan</li>
                                <li>Sistem akan otomatis menutup ujian ketika waktu habis</li>
                            </ul>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold text-gray-800">2. Ketentuan Umum</h4>
                            <ul class="list-disc ml-6 mt-2 text-gray-700">
                                <li>Dilarang keras melakukan kecurangan dalam bentuk apapun</li>
                                <li>Dilarang membuka tab/browser lain selama ujian berlangsung</li>
                                <li>Pastikan koneksi internet stabil sebelum memulai</li>
                            </ul>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold text-gray-800">3. Teknis Pengerjaan</h4>
                            <ul class="list-disc ml-6 mt-2 text-gray-700">
                                <li>Jika browser tertutup, login kembali untuk melanjutkan ujian</li>
                                <li>Sisa waktu akan tetap berjalan meskipun browser tertutup</li>
                                <li>Jawaban yang sudah tersimpan tidak akan hilang</li>
                            </ul>
                        </div>

                        <div class="border-l-4 border-blue-500 pl-4">
                            <h4 class="font-semibold text-gray-800">4. Sanksi Pelanggaran</h4>
                            <ul class="list-disc ml-6 mt-2 text-gray-700">
                                <li>Pelanggaran akan berakibat pengurangan nilai atau diskualifikasi</li>
                                <li>Sistem mendeteksi aktivitas mencurigakan secara otomatis</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>