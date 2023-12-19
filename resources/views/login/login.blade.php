@extends('register._base.layout')

@section('content')

    <div class="container vh-100">
        <div class="row h-100 align-items-center px-5 mx-5">
            <div class="col align-items-center">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><h1 class="text-center">Form Login</h1></div>
                    <div class="card-body">
                        <form action="{{ route('login.store') }}" method="post">
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
                            <div class="mb-3">
                                <label>Belum punya akun? <a href="{{ route('register') }}">Register</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection