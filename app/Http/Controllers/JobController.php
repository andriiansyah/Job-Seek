<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function __construct()
    {
        // Buat cek hak_akses, agar hak akses pembeli tidak bsa masuk dashboard penjual

        // $this->middleware('auth');
        // $this->middleware('log')->only('index');
        // $this->middleware('subscribed')->except('store');
        // dd(Auth::user());
        // if(Auth::user()->id == 2) {
        //     dd("lamaran");
        // }
    }

    public function index()
    {
        // dd(Auth::user()->id);
        $data = Job::where('id_user', '=', Auth::user()->id)->get();
        return response()->view('dashboard.page.job.job', ['data' => $data])->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }

    public function create()
    {
        return view('dashboard.page.job.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required'
        ]);

        Job::create([
            'id_user' => Auth::user()->id,
            'judul' => $request->judul,
            'posisi' => $request->posisi,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect(route('job'));
    }

    public function edit($id)
    {
        $data = Job::where('id', $id)->first();
        return view('dashboard.page.job.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'posisi' => 'required',
            'deskripsi' => 'required'
        ]);
        // dd('succes');
        $data = Job::find($id);
        
        $data->judul = $request->judul;
        $data->posisi = $request->posisi;
        $data->deskripsi = $request->deskripsi;
        $data->save();
        return redirect(route('job'));
    }

    public function destroy($id)
    {
        Job::destroy($id);

        session()->flash('success', 'Anda berhasil mendelete Data');
        return redirect(route('job'));
    }
}
