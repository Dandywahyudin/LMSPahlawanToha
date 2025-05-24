<?php

namespace App\Http\Controllers;

use App\Models\Exam;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ExamsController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        return view('dashboardAdmin', compact('exams'));
    }

    public function create()
    {
        return view('exam.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'gform_link' => 'required|url',
            'duration' => 'required|integer|min:1',
        ]);

            $exam = new Exam();
            $exam->title = $request->title;
            $exam->gform_link = $request->gform_link;
            $exam->duration = $request->duration;
            $exam->token = Str::random(8);  // Generate token acak 8 karakter
            $exam->save();  // Simpan data ke database

        return redirect()->route('admin.dashboard')->with('success', 'Ujian berhasil ditambahkan.');
    }

    public function checkToken(Request $request)
    {
        $request->validate(['token' => 'required']);
        
        $exam = Exam::where('token', $request->token)->first();

        if (!$exam) {
            return back()->withErrors(['token' => 'Token tidak valid']);
        }

        $user = Auth::user();

        if (!$user->exams->contains($exam->id)) {
            $user->exams->attach($exam->id, ['started_at' => now()]);
        }

        return view('exam.show', compact('exam'));
    }

    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Ujian berhasil dihapus.');
    }


    
}

