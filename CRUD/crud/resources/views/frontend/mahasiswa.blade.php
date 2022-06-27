@extends('frontend.template')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mahasiswa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" onclick="ts()">Home</a></li>
                        <li class="breadcrumb-item active">Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm col-12">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default" data-toggle="modal"
                                            data-target="#modal-default-add">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Umur</th>
                                    </tr>
                                </thead>
                                <tbody id="dataMhs">
                                    {{-- @foreach ($mahasiswa as $data)
                                        <tr data-toggle="modal" data-target="#modal-default"
                                            onclick="klik({{ $data }})">
                                            <td>{{ $data->nim }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->jenisKelamin }}</td>
                                            <td>{{ $data->umur }}</td>
                                            <td hidden>{{ $data->id }}</td>
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade show" id="modal-default" style="padding-right: 15px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUpdate">
                        <input type="hidden" id="id">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateNim" placeholder="NIM">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateNama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="updateJk">
                                    <option>L</option>
                                    <option>P</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="updateUmur" placeholder="Umur">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content">
                    <button type="button" class="btn btn-danger" onclick="deleteMhs($('#id').val())">Delete</button>
                    <button type="button" class="btn btn-primary" onclick="updateMhs()">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade show" id="modal-default-add" style="padding-right: 15px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Data Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" name="nim" class="form-control" id="addNim" placeholder="NIM">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" id="addNama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenisKelamin" class="form-control" id="addJk">
                                    <option>L</option>
                                    <option>P</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Umur</label>
                            <div class="col-sm-10">
                                <input type="number" name="umur" class="form-control" id="addUmur" placeholder="Umur">
                            </div>
                        </div>
                        <div class="modal-footer justify-content">
                            <button type="submit" class="btn btn-primary" onclick="addMhs()">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="toast-container" class="toast-top-right">
        <div class="toast toast-success" aria-live="polite" style="">
            <div class="toast-message">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr.
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            getData();
        };
        var no = 1;
        function getData(){
            $.ajax({
                type : 'get',
                url : '/mahasiswa/getData',
                success : function(data){  
                    $('tbody').html('');              
                    $(data).each(function(x,y){
                        result = 
                        '<tr data-toggle="modal" data-target="#modal-default" onclick=klik('+y.id+')>'
                            + '<td>'+no+'</td>'
                            + '<td>'+y.nim+'</td>'
                            + '<td id="tdnama'+y.id+'">'+y.nama+'</td>'
                            + '<td id="tdjk'+y.id+'">'+y.jenisKelamin+'</td>'
                            + '<td id="tdumur'+y.id+'">'+y.umur+'</td>'
                            + '<td hidden id="tdid'+y.id+'">'+y.id+'</td>'
                        + '</tr>';
                        $('tbody').append(result);
                        no++;
                    });            
                },
            });
        }
        function klik(id) {
            let url = `/mahasiswa/getData/${id}`;
            $.ajax({
                type : 'get',
                url : url,
                success : function(data){  
                    $('#modal-default').modal('show');
                    $('#updateNim').val(data.nim); 
                    $('#updateNama').val(data.nama); 
                    $('#updateJk').val(data.jenisKelamin); 
                    $('#updateUmur').val(data.umur);
                    $('#id').val(data.id);        
                },
            });
        }

        function tsUpdate(){
            $(document).Toasts('create', {
                class: 'bg-success',
                icon: 'fa fa-check',
                title: 'Sukses',
                autohide: true,
                delay: 3000,
                body: 'Data mahasiswa berhasil diubah'
            })
        }
        function tsDelete(){
            $(document).Toasts('create', {
                class: 'bg-success',
                icon: 'fa fa-check',
                title: 'Sukses',
                autohide: true,
                delay: 3000,
                body: 'Data mahasiswa berhasil dihapus'
            })
        }

        function addMhs() {
            var nim = $('#addNim').val();
            var nama = $('#addNama').val();
            var jenisKelamin = $('#addJk').val();
            var umur = $('#addUmur').val();
            
            let url = `/mahasiswa/add`;
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    nim: nim,
                    nama: nama,
                    jenisKelamin: jenisKelamin,
                    umur: umur,
                    _token: token
                },
                dataType: 'json',
                success: function(response) {
                    tsUpdate();
                    $('#modal-default-add').modal('hide');
                    getData();  
                }
            });
        }

        function updateMhs() {
            var nim = $('#updateNim').val();
            var nama = $('#updateNama').val();
            var jenisKelamin = $('#updateJk').val();
            var umur = $('#updateUmur').val();
            var id = $('#id').val();
            let url = `/mahasiswa/update/${id}`;
            let token = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: url,
                type: 'PUT',
                data: {
                    nim: nim,
                    nama: nama,
                    jenisKelamin: jenisKelamin,
                    umur: umur
                },
                dataType: 'json',
                success: function(response) {
                    tsUpdate();
                    $('#modal-default').modal('hide');
                    getData();
                }
            });
        }

        function deleteMhs(id) {
            if (confirm("Yakin ingin menghapus data?")) {
                let url = `/mahasiswa/delete/${id}`;
                let token = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: token
                    },
                    success: function(response) {
                        tsDelete();
                        $('#modal-default').modal('hide');
                        getData();
                    }
                });
            }
        }
    </script>
@endsection
