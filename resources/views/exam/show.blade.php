<x-app-layout>
    <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 sm:gap-0 w-full">
        <h2 class="text-xl font-semibold">{{ $exam->title }}</h2>

        <div class="flex items-center space-x-2 sm:ml-auto">
            <span class="text-black-500 text-base sm:text-xl font-bold">Waktu Tersisa:</span>
            <div id="timer" class="text-red-500 text-base sm:text-xl font-bold"></div>
        </div>
    </div>
</x-slot>
    <div class="relative h-[calc(100vh-120px)] overflow-hidden mt-4">
    <iframe 
        src="{{ $exam->gform_link }}" 
        class="absolute top-0 left-0 w-full h-full border-0" 
        frameborder="0" 
        allowfullscreen>
    </iframe>
</div>

    <script>
    const timerDisplay = document.getElementById("timer");
    const endTime = new Date("{{ $exam->pivot->finished_at }}").getTime();

    const timer = setInterval(function () {
    const now = new Date().getTime();
    const distance = endTime - now;

    if (distance <= 0) {
        clearInterval(timer);
        alert("Waktu ujian selesai!");
        window.location.href = "/dashboard";
    }

    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);
    document.getElementById("timer").innerHTML = minutes + "m " + seconds + "s ";
}, 1000);

</script>

<div id="timer" class="text-red-500 text-xl font-bold"></div>

</x-app-layout>
