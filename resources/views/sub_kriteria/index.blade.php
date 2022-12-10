@extends('layouts.master')

@section('content')
@section ('title') {{ 'Sub-Kriteria' }} @endsection

        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel </span> Sub-Kriterria</h4>

            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header"> 
                    <a href="/sub-kriteria/create" class="btn btn-primary">Tambah Sub-Kriteria</a> 
                </h5>
                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kriteria</th>
                                <th>Nama</th>
                                <th>Skor</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($subkriteria as $sk)
                                
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $no++ }}</strong></td>
                                    <td>{{ @$sk->kriteria->nama }}</td>
                                    <td>{{ $sk->nama }}</td>
                                    <td>{{ $sk->score }}</td>
                                    <td>
                                    {{-- <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div> --}}
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning" href="/sub-kriteria/{{ $sk->id}}/edit">Edit</a>
                                        <form  action="/sub-kriteria/{{ $sk->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input class="btn btn-danger btndelete" type="submit" value="Delete">
                                        </form>
                                    </div>
                                    </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <!--/ Hoverable Table rows -->
            
        </div>
        <!-- / Content -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function () {
        
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        
                $('.btndelete').click(function (e) {
                    e.preventDefault();
        
                    var deleteid = $(this).closest("tr").find('.delete_id').val();
        
                    swal({
                            title: "Apakah anda yakin?",
                            text: "Setelah dihapus, Anda tidak dapat memulihkan Data ini lagi!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
        
                                var data = {
                                    "_token": $('input[name=_token]').val(),
                                    'id': deleteid,
                                };
                                $.ajax({
                                    type: "DELETE",
                                    url: 'sub-kriteria/' + deleteid,
                                    data: data,
                                    success: function (response) {
                                        swal(response.status, {
                                                icon: "success",
                                            })
                                            .then((result) => {
                                                location.reload();
                                            });
                                    }
                                });
                            }
                        });
                });
        
            });
        
        </script>
    
@endsection