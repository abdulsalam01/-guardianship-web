@extends('layout.backend.app',[
'title' => 'Data Perwalian',
'pageTitle' =>'Data Perwalian',
])

@push('css')
    <link href="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.css"
        rel="stylesheet">
@endpush

@section('content')
    <div class="notify"></div>

    <div class="card">
        <div class="card-header">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
                Tambah Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Semester</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="create-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createForm">
                        <div class="form-group">
                            <label for="n">Nama Mahasiswa</label>
                            <input type="" required="" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control">
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
    </div>
    <!-- Modal Create -->

    <!-- Modal Edit -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="form-group">
                            <label for="name">Nama Mahasiwa</label>
                            <input type="hidden" required="" id="id" name="id" class="form-control">
                            <input type="" required="" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control">
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
                    <button type="submit" class="btn btn-primary btn-update">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->

    <!-- Destroy Modal -->
    <div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="destroy-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroy-modalLabel">Yakin Hapus ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger btn-destroy">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Destroy Modal -->

@stop

@push('js')
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template/backend/sb-admin-2') }}/js/demo/datatables-demo.js"></script>

    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('perwalian.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'semester', name: 'semester'},
                    {data: 'year', name: 'year'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: true},
                ]
            });
        });


        // Reset Form
        function resetForm() {
            $("[title='title']").val("")
        }
        //

        // Create

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

        // Create

        // Edit & Update
        $('body').on("click", ".btn-edit", function() {
            var id = $(this).attr("id")
            $.ajax({
                url: "/admin/jurusan/" + id + "/edit",
                method: "GET",
                success: function(response) {
                    $("#edit-modal").modal("show")
                    $("#id").val(response.id)
                    $("#title_updt").val(response.title)
                }
            })
        });

        $("#editForm").on("submit", function(e) {
            e.preventDefault()
            var id = $("#id").val()

            $.ajax({
                url: "/admin/jurusan/" + id,
                method: "PATCH",
                data: $(this).serialize(),
                success: function() {
                    $('.data-table').DataTable().ajax.reload();
                    $("#edit-modal").modal("hide")
                    flash("success", "Data berhasil diupdate")
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })
        })
        //Edit & Update

        $('body').on("click", ".btn-delete", function() {
            var id = $(this).attr("id")
            $(".btn-destroy").attr("id", id)
            $("#destroy-modal").modal("show")
        });

        $(".btn-destroy").on("click", function() {
            var id = $(this).attr("id")

            $.ajax({
                url: "/admin/jurusan/" + id,
                method: "DELETE",
                success: function() {
                    $("#destroy-modal").modal("hide")
                    $('.data-table').DataTable().ajax.reload();
                    flash('success', 'Data berhasil dihapus')
                }
            });
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
