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
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Mahasiswa</th>
                            <th>Jurusan</th>
                            <th>Dosen Wali (You)</th>
                            <th>Catatan</th>
                            <th>Semester</th>
                            <th>Tahun</th>
                            <th>Status</th>
                            <th>Approval</th>
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
                            <select class="form-control" name="user_id" id="user_idC">
                                @foreach ($mahasiswa as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="#">Jurusan</label>
                            <select class="form-control" name="id_jurusan" id="id_jurusan">
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item ->id }}">{{ $item ->title }}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="n">Semester</label>
                            <select class="form-control" name="semester" id="semesterC">
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="n">Tahun</label>
                            <select class="form-control" name="year" id="yearC">
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="#">Dosen</label>
                            <select class="form-control" name="id_dosen" id="id_dosen">
                                @foreach ($dosen as $item)
                                    <option value="{{ $item ->id }}">{{ $item ->name }}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="#">Catatan</label>
                            <textarea class="form-control" name="subject" id="subjectC" rows="4"></textarea>
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
                            <select class="form-control" name="user_id" id="user_id">
                                @foreach ($mahasiswa as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="#">Jurusan</label>
                            <select class="form-control" name="id_jurusan" id="id_jurusan">
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item ->id }}">{{ $item ->title }}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label for="n">Semester</label>
                            <select class="form-control" name="semester" id="semester">
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="n">Tahun</label>
                            <select class="form-control" name="year" id="year">
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="#">Dosen</label>
                            <select class="form-control" name="id_dosen" id="id_dosen">
                                @foreach ($dosen as $item)
                                    <option value="{{ $item ->id }}">{{ $item ->name }}</option>
                                @endforeach
                            </select>
                        </div> -->
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
                ajax: "{{ route('perwalian-dosen.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'users.name', name: 'user_id'},
                    {data: 'users.major.title', name: 'major_title'},
                    {data: 'users.teacher.name', name: 'teacher'},
                    {data: 'subject', name: 'subject'},
                    {data: 'semester', name: 'semester'},
                    {data: 'year', name: 'year'},
                    {data: 'status', name: 'status'},
                    {data: 'approval', name: 'approval', orderable: false, searchable: true},
                ]
            });
        });


        // Reset Form
        function resetForm() {
            $("#user_id").val("")
            $("#semester").val("")
            $("#year").val("")
            $("#subject").val("")
        }
        //

        // Create

        $("#createForm").on("submit", function(e) {
            e.preventDefault()
            console.log($(this).serialize())
            $.ajax({
                url: "/dosen/perwalian-dosen",
                method: "POST",
                data: $(this).serialize(),
                success: function(e) {
                    console.log(e)
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
                url: "/dosen/perwalian-dosen/" + id + "/edit",
                method: "GET",
                success: function(response) {
                    $("#edit-modal").modal("show")
                    $("#id").val(response.id)
                    $("#user_id").val(response.user_id)
                    $("#semester").val(response.semester)
                    $("#year").val(response.year)
                    $("#subject").val(response.subject)
                }
            })
        });

        $("#editForm").on("submit", function(e) {
            e.preventDefault()
            var id = $("#id").val()

            $.ajax({
                url: "/dosen/perwalian-dosen/" + id,
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
                url: "/dosen/perwalian-dosen/" + id,
                method: "DELETE",
                success: function() {
                    $("#destroy-modal").modal("hide")
                    $('.data-table').DataTable().ajax.reload();
                    flash('success', 'Data berhasil dihapus')
                }
            });
        })

        // approved
        $('body').on("click", ".btn-approve", function() {
            var id = $(this).attr("id")
            $.ajax({
                url: "/dosen/perwalian-approval/" + id,
                method: "PATCH",
                data: {'status': 'approved'},
                success: function() {
                    $('.data-table').DataTable().ajax.reload();
                    flash("success", "Data berhasil di-approve")
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })            
        });

        // rejected
        $('body').on("click", ".btn-reject", function() {
            var id = $(this).attr("id")
            $.ajax({
                url: "/dosen/perwalian-approval/" + id,
                method: "PATCH",
                data: {'status': 'rejected'},
                success: function() {
                    $('.data-table').DataTable().ajax.reload();
                    flash("success", "Data berhasil di-reject")
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            })            
        });


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
