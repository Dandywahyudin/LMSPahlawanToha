<x-app-layout>

@section('content')
<div class="max-w-4xl mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6">Daftar Ujian</h2>
    <a href="{{ route('exam.create') }}" class="mb-4 inline-block px-4 py-2 bg-indigo-600 text-white rounded">+ Tambah Ujian</a>

    <table class="w-full table-auto">
        <thead>
            <tr>
                <th class="text-left">Mata Pelajaran</th>
                <th class="text-left">Link Form</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams as $exam)
            <tr>
                <td>{{ $exam->mata_pelajaran }}</td>
                <td><a href="{{ $exam->link_form }}" target="_blank" class="text-blue-600 underline">Lihat Form</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
</x-app-layout>