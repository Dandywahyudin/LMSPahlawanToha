<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Exam;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class SiswaExamController extends Controller
{
    // Menampilkan daftar ujian siswa
    public function index()
    {
        return view('siswa.index');
    }

    // Menampilkan form token untuk masuk ujian
    public function tokenForm()
    {
        return view('exam.token');
    }

     public function checkToken(Request $request)
    {
        $request->validate(['token' => 'required']);

        $exam = Exam::where('token', $request->token)->first();

        if (!$exam) {
            return back()->withErrors(['token' => 'Token tidak valid']);
        }

        $user = Auth::user();

        // Cek apakah user sudah pernah memulai ujian ini
        $alreadyStarted = $user->exams()->where('exam_id', $exam->id)->exists();

        if ($alreadyStarted) {
            return redirect()->route('siswa.exam.show', $exam->id)
                ->with('info', 'Anda sudah memulai ujian ini sebelumnya.');
        }

        // Jika belum, simpan waktu mulai dan selesai
        $startedAt = now()->timezone('Asia/Jakarta');
        $finishedAt = $startedAt->copy()->addMinutes($exam->duration);

        $user->exams()->attach($exam->id, [
            'started_at' => $startedAt,
            'finished_at' => $finishedAt,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('siswa.exam.show', $exam->id);
    }

    public function show($examId)
    {
        $user = Auth::user();

        $exam = $user->exams()->where('exam_id', $examId)->first();

        if (!$exam) {
            return redirect()->route('dashboard')->withErrors('Ujian tidak ditemukan.');
        }

        return view('exam.show', compact('exam'));
    }


}
