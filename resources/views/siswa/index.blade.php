<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Ujian') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <h2 class="text-xl font-semibold">Masukkan Token Ujian</h2>
    </x-slot>

    <form method="POST" action="{{ route('exam.token.check') }}" class="p-4">
        @csrf
        <input type="text" name="token" class="border p-2 w-full" placeholder="Token ujian" required>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Mulai Ujian</button>
        @error('token') <p class="text-red-600 mt-1">{{ $message }}</p> @enderror
    </form>
    
</x-app-layout>
