@extends('page.template')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Edit Data Peserta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item">Data Peserta</li>
                <li class="breadcrumb-item">Edit Data Peserta</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('getPeserta') }}" class="btn btn-sm btn-primary bg-gradient-primary mb-3"><i
                            class="fas fa-arrow-left">Kembali</i></a>
                    <form action="{{ route('dataPeserta.updateData') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama"
                                value="{{ $peserta->data->attributes->namaPegawai }}" placeholder="Masukkan nama">
                            <input type="text" name="id" value="{{ Crypt::encryptString($peserta->data->id) }}" hidden>
                        </div>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/vendor/data-table/extensions/responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/data-table/extensions/responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery/js/jquery.mask.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/chosen_v1.8.7/chosen.jquery.js') }}"
        type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            var table = $('#dttable').DataTable({
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "dom": 'lfrtip'
            });
            table.columns().iterator('column', function (ctx, idx) {
                $(table.column(idx).header()).append('<span class="sort-icon"/>');
            });
        });

        // var table = $('#dttable').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     bFilter: false,
        //     ajax: {
        //         url: "{{ url('master/dataPeserta/json') }}",
        //     },

        //     columns: [{
        //             'mRender': function(data, type, full, meta) {
        //                 return +meta.row + meta.settings._iDisplayStart + 1;
        //             }
        //         },
        //         {
        //             data: 'nama',
        //             name: 'nama',
        //         },
        //         {
        //             data: 'NIP',
        //             name: 'NIP',
        //         },
        //         {
        //             data: 'grade',
        //             name: 'grade',
        //         },
        //         {
        //             data: 'jenjang',
        //             name: 'jenjang',
        //         },
        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searchable: false
        //         },
        //     ]
        // });
    </script>
@endsection
