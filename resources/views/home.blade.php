<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
</script>

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <span class="mt-2 ml-1">
                            {{ __('SISWAS') }}
                        </span>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">Tambah siswa</button></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NIM</th>
                                <th scope="col">nama</th>
                                <th scope="col">tanggal lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $i )
                            <tr>
                                <td>{{$i->nim}}</td>
                                <td>{{$i->nama}}</td>
                                <td>{{$i->tgl_lahir}}</td>
                                <td>{{$i->alamat}}</td>
                                <td>{{$i->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal">Edit</button>
                                    <button type="button" class="btn btn-danger ml-2"><a
                                            class="text-white text-decoration-none" href="/delete/{{$i->id}}">Delete</a>
                                    </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/editsiswa" id="editform" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="NAMA">Nama</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="{{$i->nama}}" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NAMA">TTL</label>
                                                    <input type="date" name="tgl_lahir" class="form-control" id="">
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="0"
                                                        checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Perempuan
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="1"
                                                        checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Laki Laki
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" name="alamat" class="form-control" placeholder="{{$i->alamat}}" id="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" name="email" class="form-control" placeholder="{{$i->email}}" id="">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" form="editform">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form action="/addsiswa" id="addform" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="NIM">NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan Nim" id="">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" id="">
                        </div>
                        <div class="form-group">
                            <label for="NAMA">TTL</label>
                            <input type="date" name="tgl_lahir" class="form-control" id="">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="0"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Perempuan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="1"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Laki Laki
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="alamat" id="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan Email" id="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addform">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
