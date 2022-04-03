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
                            <th>Nama Mahasiswa (You)</th>
                            <th>Jurusan</th>
                            <th>Dosen Wali</th>
                            <th>Catatan</th>
                            <th>Semester</th>
                            <th>Tahun</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
                ajax: "{{ route('perwalian-mahasiswa.list') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'users.name', name: 'user_id'},
                    {data: 'users.major.title', name: 'major_title'},
                    {data: 'users.teacher.name', name: 'teacher'},
                    {data: 'subject', name: 'subject'},
                    {data: 'semester', name: 'semester'},
                    {data: 'year', name: 'year'},
                    {data: 'status', name: 'status'}
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
