@extends('layouts.app_sneat')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header">Data Marketing</h5>

                <div class="card-body">
                    <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-2">Tambah Data</a>
                    <div class="card-datatable table-responsive">
                        <table id="example" class="table table-striped datatables-basic">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>No User</th>
                                    <th>Nama</th>
                                    <th>No Rekening</th>
                                    <th>status</th>
                                    <th>Akses</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->id_user }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->no_rek }}</td>
                                        <td>
                                            @if ($user->status == 'aktif')
                                                <span class="badge rounded-pill bg-label-warning">Aktif</span>
                                            @else
                                                <span class="badge rounded-pill bg-label-danger">Pending</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->akses }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('user.destroy', $user->id_user) }}">
                                                <a href="{{ route('user.edit', $user->id_user) }}" class="btn btn-warning">Edit</a>
                                                <a href="{{ route('user.show', $user->id_user) }}" class="btn btn-info">Show</a>

                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center">Data Tidak Ada</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $("#example").DataTable({
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
    </script>
@endpush
