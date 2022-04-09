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
                    <input type="hidden" required="" name="user_id" class="form-control" value="{{ Auth::id() }}" >
                    <input type="" required="" id="nama_mahasiswa" name="nama_mahasiswa" class="form-control" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="#">Jurusan</label>
                    <input type="" required="" class="form-control" value="{{$data->major->title}}" disabled>                    
                </div>
                <div class="form-group">
                    <label for="#">Dosen Wali</label>
                    <input type="" required="" class="form-control" value="{{$data->teacher->name}}" disabled>                    
                </div>                
                <div class="form-group">
                    <label for="n">Semester</label>
                    <input type="number" required="" id="semester_num" name="semester_num" class="form-control"/>
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
                <div class="form-group">
                    <label for="#">Catatan</label>
                    <textarea class="form-control" name="subject" id="subject" rows="4" required=""></textarea>
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
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('perwalian-mahasiswa') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'users.name', name: 'user_id'},
                    {data: 'users.major.title', name: 'major_title'},
                    {data: 'users.teacher.name', name: 'teacher'},
                    {data: 'subject', name: 'subject'},
                    {data: 'semester', name: 'semester'},
                    {data: 'year', name: 'year'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: true},
                    {data: 'approval', name: 'approval', orderable: false, searchable: true},
                ]
            });
        });


        // Reset Form
        function resetForm() {
            $("#user_id").val("")
            $("#semester").val("")
            $("#semester_num").val("")
            $("#year").val("")
            $("#subject").val("")
        }
        //

        // Create

        $("#createForm").on("submit", function(e) {
            e.preventDefault()
            $.ajax({
                url: "/mahasiswa/perwalian-create",
                method: "POST",
                data: $(this).serialize(),
                success: function(e) {
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
                url: "/mahasiswa/perwalian/" + id + "/edit",
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
                url: "/mahasiswa/perwalian/" + id,
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
                url: "/mahasiswa/perwalian/" + id,
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
