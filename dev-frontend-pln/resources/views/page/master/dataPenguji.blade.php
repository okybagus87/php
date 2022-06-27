@extends('page.template')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Data Penguji</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Master</a></li>
                <li class="breadcrumb-item active">Data Penguji</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('dataPenguji.add') }}" class="btn btn-sm bg-primary mb-3"><i
                            class="fas fa-plus-circle">Tambah
                            Data Penguji</i></a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dttable">
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
                                @foreach ($penguji->data as $data)
                                    @if ($data->attributes->role == 'Penguji')
                                        <tr>
                                            <input type="text" value="{{ Crypt::encryptString($data->id) }}"
                                                id="idPeserta" hidden>
                                            <td><?php echo $no; ?></td>
                                            <td>{{ $data->attributes->namaPegawai }}</td>
                                            <td>{{ $data->attributes->NIP }}</td>
                                            <td>{{ $data->attributes->jabatan->data->attributes->namaJabatan }}
                                            </td>
                                            <td>{{ $data->attributes->grade }}</td>
                                            <td>{{ $data->attributes->jenjang }}</td>
                                            <td>{{ $data->attributes->role }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="dataPenguji/getPengujiById/{{ Crypt::encryptString($data->id) }}">
                                                        <button type="button" class="btn bg-teal btn-xs" title="Edit" id="btnEdit">
                                                            <i class="fas fa-pen"></i>
                                                        </button>
                                                    </a>
                                                    <a href="#delModal" data-id="{{Crypt::encryptString($data->id)}}" data-toggle="modal">
                                                        <button type="button" class="btn bg-pink btn-xs" title="Hapus">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
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
        <div class="modal fade show" id="delModal" aria-modal="true" role="dialog"
            style="padding-right: 15px;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin untuk menghapus data ini?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="" id="delHref"><button type="button" class="btn btn-outline-danger">Hapus</button></a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div id="toastsContainerTopRight" class="toasts-top-right fixed"></div>
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
                "dom": 'lfrtip',
                "rowCallback": function( row, data, index ) {
                    if (index % 2 == 0) {
                        $('td', row).css('background-color', '#ecf5ff');
                    }
                }
            });
            table.columns().iterator('column', function(ctx, idx) {
                $(table.column(idx).header()).prepend('<span class="sort-icon"/>');
            });
        });

        $('#delModal').on('show.bs.modal', function(event) {
            const link = $(event.relatedTarget);
            const id = link.data('id');
            const url = `{{ url('master/dataPenguji/delete') }}/` + id;
            const modal = $(this);
            modal.find('.modal-footer #delHref').attr('href', url);
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
