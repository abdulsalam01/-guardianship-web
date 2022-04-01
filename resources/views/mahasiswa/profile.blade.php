@extends('layout.backend.app',[
'title' => 'Welcome',
'pageTitle' => 'Pengaturan Akun',
])
@section('content')
    @include('layout.component.alert-dismissible')

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Edit Akun
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('akun-mahasiswa.update', Auth::user()->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input required="" value="{{ Auth::user()->name }}" class="form-control" type="" id="name"
                                name="name">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="#">Jurusan</label>
                                <select class="form-control" name="id_jurusan" id="id_jurusan">
                                    @foreach ($jurusan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ Auth::user()->major_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required="" value="{{ Auth::user()->password }}" class="form-control" type="hidden"
                                id="old_password" name="old_password">
                            <input type="password" id="password" name="password" class="form-control">
                            <small class="text-secondary">kosongkan kolom password jika tidak ingin mengubah
                                password</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Update</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
@endsection
