<?php

namespace App\Http\Controllers;

use App\Interview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InterviewController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
    	// mengambil data dari table pegawai
    	$interview = DB::table('interview')->get();

    	// mengirim data pegawai ke view index
    	return view('index',['interview' => $interview]);

    }

    public function show(Interview $interview)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.show',$post->id) }}
        return view('interview.show',compact('interview'));
    }

    public function create()
    {
        /// menampilkan halaman create
        return view('interview.create');
    }

    public function store(Request $request)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'npm' => 'required',
        ]);

        /// insert setiap request dari form ke dalam database via model
        /// jika menggunakan metode ini, maka nama field dan nama form harus sama
        Interview::create($request->all());

        /// redirect jika sukses menyimpan data
        return redirect()->route('interview.index')
                        ->with('success','Interview created successfully.');
    }

    public function edit(Interview $interview)
    {
        /// dengan menggunakan resource, kita bisa memanfaatkan model sebagai parameter
        /// berdasarkan id yang dipilih
        /// href="{{ route('posts.edit',$post->id) }}
        return view('interview.edit',compact('interview'));
    }

    public function update(Request $request, Interview $interview)
    {
        /// membuat validasi untuk title dan content wajib diisi
        $request->validate([
            'npm' => 'required',
        ]);

        /// mengubah data berdasarkan request dan parameter yang dikirimkan
        $interview->update($request->all());

        /// setelah berhasil mengubah data
        return redirect()->route('interview.index')
                        ->with('success','Interview updated successfully');
    }

    public function delete(Interview $interview)
    {
        /// melakukan hapus data berdasarkan parameter yang dikirimkan
        $interview->delete();

        return redirect()->route('interview.index')
                        ->with('success','Interview deleted successfully');
    }
}
