@extends('dashboard._base.layout')

@section('content')
    <h1>Edit Job</h1>
    @if(session()->has('failed'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('failed') }}
        </div>
    @endif
    <div class="card p-3">
        <form action="{{ Route('job.update', $data->id) }}" method="post">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $data->judul }}" placeholder="Judul">
            </div>
            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input type="text" class="form-control" name="posisi" id="posisi" value="{{ $data->posisi }}" placeholder="Posisi">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3">{{ $data->deskripsi }}</textarea>
            </div>
            <button class="btn btn-primary">Edit</button>
        </form>
    </div>
    
@endsection