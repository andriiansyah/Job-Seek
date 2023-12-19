@extends('dashboard._base.layout')

@section('content')
    <h1>Job</h1>
    @if(session()->has('success'))
        <div class="alert alert-danger" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif
    <a href="{{ route('job.create') }}" class="btn btn-primary mb-2">+ Tambah data</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id User</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Id User</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Posisi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach($data as $res)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $res->id_user }}</td>
                                <td>{{ $res->judul }}</td>
                                <td>{{ $res->posisi }}</td>
                                <td>{{ $res->deskripsi }}</td>
                                <td>
                                    <a href="{{ Route('job.edit', $res->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ Route('job.destroy', $res->id) }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ dd(Auth::user()->email) }} --}}
        </div>
    </div>
    
@stop