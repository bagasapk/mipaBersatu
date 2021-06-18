<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        /// mengambil data terakhir dan pagination 5 list
        $questions = Question::latest()->paginate(5);

        /// mengirimkan variabel $questions ke halaman views questions/index.blade.php
        /// include dengan number index
        return view('questions.index', compact('questions'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        /// menampilkan halaman create
        return view('questions.create');
    }

    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Question::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    public function show(Question $question)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('questions.show',$Question->id) }}
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('questions.edit',$Question->id) }}
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $question->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('questions.index')
            ->with('success', 'Question updated successfully');
    }

    public function destroy(Question $question)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
