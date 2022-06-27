@extends('page.template')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Peserta</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Master</li>
                <li class="breadcrumb-item">Data Peserta</li>
                <li class="breadcrumb-item">Tambah Data Peserta</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('getPeserta') }}" class="btn btn-sm btn-primary bg-gradient-primary mb-3"><i
                            class="fas fa-arrow-left">Kembali</i></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dttable"">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Grade</th>
                                    <th>Jenjang</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($peserta->data as $data)
                                @if ($data->attributes->role != 'Peserta')
                                    <tr>
                                        <th><?php echo $no; ?></th>
                                        <td>{{ $data->attributes->namaPegawai }}</td>
                                        <td>{{ $data->attributes->NIP }}</td>
                                        <td>{{ $data->attributes->jabatan->data->attributes->namaJabatan }}</td>
                                        <td>{{ $data->attributes->grade }}</td>
                                        <td>{{ $data->attributes->jenjang }}</td>
                                        <td>{{ $data->attributes->role }}</td>
                                        <td><a href="updateRole/{{ Crypt::encryptString($data->id) }}"><button
                                                    class="btn btn-info btn-sm"><i
                                                        class="fas fa-plus-circle"><span>Tambah</span></i></i></button></a></td>
                                    </tr>
                                    <?php
                                    $no++;
                                    ?>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
                $(table.column(idx).header()).prepend('<span class="sort-icon"/>');
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
