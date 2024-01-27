@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Marketing</h5>

                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    <div id="buttonPlacement" style="width: 25px; height: 25px"></div>
                    <div class="table-responsive">
                        <table class="table table-striped data-table">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>No User</th>
                                    <th>Nama</th>
                                    <th>No Rekening</th>
                                    {{-- <th>Password</th> --}}
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverside: true,
                ajax: "{{ route('user.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'id_user', name: 'id_user'},
                    {data: 'nama', name: 'nama'},
                    {data: 'no_rek', name: 'no_rek'},
                    {data: 'akses', name: 'akses'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                dom: 'Bfrtip',
                buttons: [
                    {
                        title: "Data Marketing",
                        extend: "print",
                        orientation: "landscape",
                        pageSize: "LEGAL",
                        exportOptions: {columns: [":visible"]},
                        className: "btn btn-primary btn-sm"
                    },
                    {
                        title: "Data Marketing",
                        extend: "excelHtml5",
                        exportOptions: {columns: [":visible"]},
                        className: "btn btn-primary btn-sm"
                    },
                    {
                        title: "Data Marketing",
                        extend: "pdfHtml5",
                        className: "btn btn-primary btn-sm",
                        customize: function(doc) {
                            doc.styles.title = {
                                fontSize: '20',
                                alignment: 'center'
                            }
                        }
                    }
                ],
            });
        })

        $('.data-table').on('click', '.edit', function() {
            var id = $(this).data('id')
            window.location.href = "{{ url('user') }}/"+id+"/edit";
        })

        $('.data-table').on('click', '.detail', function() {
            var id = $(this).data('id')
            window.location.href = "{{ url('user') }}/"+id;
        })

        $('.data-table').on('click', '.hapus', function() {
            var id = $(this).data('id')
            $.ajax({
                url: "{{ url('user') }}/"+id,
                type: 'DELETE',
                data: {_token: '{{ csrf_token() }}'},
                success: function(response){
                    if(response.success == 1){
                        alert("Record Deleted");
                        window.location
                    }else{
                        alert("Can't Delete Record");
                    }
                }
            })
        })
    </script>
@endpush
