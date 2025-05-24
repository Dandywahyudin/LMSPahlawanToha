<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Riwayat Ujian</h2>
    </x-slot>

    <div class="p-4">
        @if ($exams->isEmpty())
            <p>Belum ada ujian yang dikerjakan.</p>
        @else
            <table class="min-w-full border">
                <thead>
                    <tr>
                        <th class="text-left p-2 border-b">Judul Ujian</th>
                        <th class="text-left p-2 border-b">Waktu Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($exams as $exam)
                        <tr class="border-t">
                            <td class="p-2">{{ $exam->title }}</td>
                            <td class="p-2">{{ $exam->pivot->started_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
