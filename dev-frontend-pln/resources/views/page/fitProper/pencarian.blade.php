@extends('page.template')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Cari Fit & Proper</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Fit & Proper</a></li>
                <li class="breadcrumb-item active">Pencarian</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form action="" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group col-12">
                            <label>NIP Peserta</label>
                            <select name="nip" class="form-control nip" id="nip">
                                <option value=""></option>
                                @foreach ($pegawai->data as $data)
                                    <option value="{{ Crypt::encryptString($data->id) }}">
                                        {{ $data->attributes->idPeserta->data->attributes->NIP }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row tabelPencarian">

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
        $('.nip').select2({
            placeholder: '-- Pilih NIP --',
            theme: 'classic'
        });

        $(".nip").change(function() {
            var str = "";
            $(".nip option:selected").each(function() {
                str += $(this).val();
            });
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: '../fit-proper/pencarian/pencarianById/' + str,
                success: function(data, status, xhr) {
                    const dt = data.data;
                    console.log(dt);
                    loadData(dt);
                }
            });
        });

        function loadData(item) {
            $('.tabelPencarian').html(
                '<div class="col-sm-12"><div class="card"><div class="card-body"><div class="table-responsive"><table class="table table-striped table-bordered" id="dttable""><thead><tr><th>NIP</th><th>Nama</th><th>Proyeksi</th><th>Jenjang Proyeksi</th><th>Tanggal Uji</th><th>Jenis</th><th>Lihat Report Nilai</th></tr></thead><tbody><tr><td>' +
                item.attributes.idPeserta.data.attributes.NIP + '</td><td>' + item.attributes.idPeserta.data
                .attributes.namaPegawai + '</td><td>'+item.attributes.proyeksi+'</td><td>' + item.attributes.jenjang_proyeksi + '</td><td>' + item.attributes
                .tanggalFitProper +
                '</td><td>'+item.attributes.jenis+'</td><td><button type="button" class="btn btn-info">Lihat Nilai</button></td></tr></tbody></table></div></div></div></div>'
            );
        }
    </script>
@endsection
