<x-app-layout>
<div class="max-w-xl mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Tambah Ujian</h2>
    <form action="{{ route('admin.dashboard') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block font-semibold">Mata Pelajaran</label>
            <input type="text" name="title" id="title" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="gform_link" class="block font-semibold">Link Google Form</label>
            <input type="url" name="gform_link" id="gform_link" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label for="duration" class="block font-semibold">Durasi Ujian (menit)</label>
            <input type="number" name="duration" id="duration" class="w-full border px-3 py-2" required>
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>

</x-app-layout>