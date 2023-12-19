@extends('register._base.layout')

@section('content')

    <div class="container vh-100">
        <div class="row h-100 align-items-center px-5 mx-5">
            <div class="col align-items-center">
                <div class="card">
                    <div class="card-header"><h1 class="text-center">Register account</h1></div>
                    <div class="card-body">
                        <form action="{{ route('register.store') }}" method="post">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="hak_akses" class="form-label">Penjual atau Pembeli ?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hak_akses" id="hak_akses1" value="1" {!! old('hak_akses') == '1' ? 'checked' : '' !!} >
                                    <label class="form-check-label" for="hak_akses1">
                                      Penjual 
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="hak_akses" id="hak_akses2" value="2" {!! old('hak_akses') == '2' ? 'checked' : '' !!}>
                                    <label class="form-check-label" for="hak_akses2">
                                        Pembeli
                                    </label>
                                </div>
                                @error('hak_akses')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                                
                            </div>
                            <div class="mb-3">
                                <label>Kembali ke <a href="{{ route('login') }}">Login</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection