<x-administrator-layout>
    @section('title', 'Monitoring Presensi intern')

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Peserta Magang</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ url('/') }}">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Menu</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Peserta Magang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-12">
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::get('warning'))
                    <div class="alert alert-warning">
                        {{ Session::get('warning') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Hadir</h4>
                            <div class="form-group">
                                <div class="input-icon mb-3">
                                    <span class="input-icon-addon">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                    <input type="text" value="{{ date('Y-m-d') }}" id="tanggal" name="tanggal"
                                        class="form-control" placeholder="Tanggal Presensi" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Jam Masuk</th>
                                        <th>Foto Prsensi Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Foto Presensi Pulang</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Jam Masuk</th>
                                        <th>Foto Prsensi Masuk</th>
                                        <th>Jam Pulang</th>
                                        <th>Foto Presensi Pulang</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </tfoot>
                                <tbody id="loadpresensi"> </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-table-script></x-table-script>
    <div class="modal modal-blur fade" id="modal-showmap" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Lokasi Presensi User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="loadmap">
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(function() {
                $("#tanggal").datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    format: 'yyyy-mm-dd'
                });

                function loadpresensi() {
                    var tanggal = $("#tanggal").val();
                    $.ajax({
                        type: 'POST',
                        url: '/getpresensi',
                        data: {
                            _token: "{{ csrf_token() }}",
                            tanggal: tanggal
                        },
                        cache: false,
                        success: function(respond) {
                            $("#loadpresensi").html(respond);
                        }
                    });
                }

                $("#tanggal").change(function(e) {
                    loadpresensi();
                });
            });
        </script>
    @endpush
</x-administrator-layout>
