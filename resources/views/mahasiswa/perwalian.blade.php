@extends('layout.backend.app',[
'title' => 'Input Perwalian',
'pageTitle' =>'Input Perwalian',
])

@push('css')
    <link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css"
        rel="stylesheet">
@endpush

@section('content')
    <div class="notify"></div>

    <div class="card">
        <div class="card-body">
            <form id="createForm">
                <div class="form-group">
                    <label for="n">Nama Mahasiswa</label>
                    <input type="" required="" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="#">Jurusan</label>
                    <select class="form-control" name="id_jurusan" id="id_jurusan">
                        @foreach ($jurusan as $item)
                            <option value="{{ $item ->id }}">{{ $item ->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="n">Semester</label>
                    <input type="" required="" id="semester" name="semester" class="form-control">
                </div>
                <div class="form-group">
                    <label for="n">Tahun</label>
                    <input type="" required="" id="tahun" name="tahun" class="form-control">
                </div>
                <div class="form-group">
                    <label for="#">Dosen</label>
                    <select class="form-control" name="id_dosen" id="id_dosen">
                        @foreach ($dosen as $item)
                            <option value="{{ $item ->id }}">{{ $item ->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="#">Catatan</label>
                    <textarea class="form-control" name="subject" id="subject" rows="4"></textarea>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-store">Simpan</button>
            </form>
        </div>
        </div>
    </div>

@stop

@push('js')
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">

        $("#createForm").on("submit", function(e) {
            e.preventDefault()

            $.ajax({
                url: "/admin/jurusan",
                method: "POST",
                data: $(this).serialize(),
                success: function() {
                    $("#create-modal").modal("hide")
                    $('.data-table').DataTable().ajax.reload();
                    flash("success", "Data berhasil ditambah")
                    resetForm()
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })
        })

        function flash(type, message) {
            $(".notify").html(`<div class="alert alert-` + type + ` alert-dismissible fade show" role="alert">
                              ` + message + `
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>`)
        }
    </script>
@endpush
