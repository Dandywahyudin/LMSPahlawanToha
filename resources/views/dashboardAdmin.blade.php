<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Daftar Ujian') }}
            </h2>
            <a href="{{ route('exam.create') }}" 
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                + Tambah Ujian
            </a>
        </div>
    </x-slot>
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="border px-4 py-2">No.</th>
                    <th class="border px-4 py-2">Mata Pelajaran</th>
                    <th class="border px-4 py-2">Token</th>
                    <th class="border px-4 py-2">Link Form</th>
                    <th class="border px-4 py-2">Durasi (menit)</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($exams as $index => $exam)
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $exam->title }}</td>
                        <td class="border px-4 py-2">{{ $exam->token }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ $exam->gform_link }}" class="text-blue-600 underline" target="_blank">Lihat Form</a>
                        </td>
                        <td class="border px-4 py-2">{{ $exam->duration }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('admin.dashboard.delete', $exam->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ujian ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-1 px-3 rounded">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada ujian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
    </div>
</x-app-layout>
