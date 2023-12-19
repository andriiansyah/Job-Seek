@extends('dashboard._base.layout')

@section('content')
    <h1>Add new Job</h1>
    <div class="card p-3">
        @if($errors->all())
            <div class="alert alert-danger">
                Your data was invalid
            </div>
        @endif
        <form action="{{ route('job.store') }}" method="post">
            @csrf
            {{-- <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="category_id">Category Id</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option selected>Choose...</option>
                        @foreach($data["category"] as $res)
                            <option value="{{ $res->id }}">
                                {{ $res->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                    <div class="form-group col-md-6">
                    <label for="brand_id">Brand Id</label>
                    <select id="brand_id" name="brand_id" class="form-control">
                        <option selected>Choose...</option>
                        @foreach($data["brand"] as $res)
                            <option value="{{ $res->id }}">
                                {{ $res->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul') }}" placeholder="Judul">
                @error('judul')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="posisi">Posisi</label>
                <input type="text" class="form-control @error('posisi') is-invalid @enderror" name="posisi" id="posisi" value="{{ old('posisi') }}" placeholder="Posisi">
                @error('posisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                @error('posisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection