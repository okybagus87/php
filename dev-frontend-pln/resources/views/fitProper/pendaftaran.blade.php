@extends('page.template')

@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Pendaftaran / Updating Peserta Fit Proper</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">Fit & Proper</a></li>
                <li class="breadcrumb-item active">Pendaftaran</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <form>
                    <div class="card-body">
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">NIP</label>
                            <select name="nip" class="form-control nip" id="nip">
                                <option value=""></option>
                                @foreach ($pegawai->data as $data)
                                    <option value="{{ Crypt::encryptString($data->id) }}">{{ $data->attributes->NIP }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="nama" readonly class="form-control nama">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Jabatan</label>
                            <input type="text" name="jabatan" readonly class="form-control jabatan">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Grade</label>
                            <input type="text" name="grade" readonly class="form-control grade">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Date</label>
                            <input type="date" name="grade" class="form-control date">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Proyeksi Jabatan</label>
                            <select name="pj" class="form-control pj">
                                <option value=""></option>
                                @foreach ($jabatan->data as $data)
                                    <option value="{{ Crypt::encryptString($data->id) }}">{{ $data->attributes->namaJabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Jenjang Jabatan</label>
                            <select name="jj" class="form-control jj">
                                <option value=""></option>
                                @foreach ($jabatan->data as $data)
                                    <option value="{{ Crypt::encryptString($data->id) }}">{{ $data->attributes->namaJabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Jenis Fit & Proper</label>
                            <input type="text" name="grade" class="form-control jenisfitproper">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Pilih Urjab</label>
                            <input type="text" name="grade" class="form-control urjab">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Upload PPT *.ppt/.pptx</label>
                            <input type="file" name="grade" class="form-control ppt">
                        </div>
                        <div class="form-group col-12">
                            <label for="exampleInputEmail1">Upload CV *.doc/docx</label>
                            <input type="file" name="grade" class="form-control doc">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
        $('.nip').select2({
            placeholder: '-- Pilih NIP --',
            theme: 'classic'
        });
        $('.pj').select2({
            placeholder: '-- Pilih Proyeksi Jabatan --',
            theme: 'classic'
        });
        $('.jj').select2({
            placeholder: '-- Pilih Jenjang Jabatan --',
            theme: 'classic'
        });

        $("select").change(function() {
            var str = "";
            $("select option:selected").each(function() {
                str += $(this).val();
            });
            $.ajax({
                type: 'GET',
                dataType: "json",
                url: 'pendaftaran/getPegawaiById/'+str,
                success: function(data, status, xhr) {
                    $('.nama').val(data.data.attributes.namaPegawai);
                    $('.jabatan').val(data.data.attributes.jabatan.data.attributes.namaJabatan);
                    $('.grade').val(data.data.attributes.grade);
                }
            });
        });
    </script>
@endsection
