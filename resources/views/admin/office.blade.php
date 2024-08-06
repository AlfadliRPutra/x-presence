<x-administrator-layout>
    @section('title', 'Konfigurasi Lokasi')

    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Forms</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Forms</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Basic Form</a>
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
                        <div class="card-title">Profil</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label"> Lokasi Kantor </label>
                                    <p class="form-control-static">
                                        {{ $loc_office->location_office }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="control-label"> Radius </label>
                                    <p class="form-control-static">
                                        {{ $loc_office->radius }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a class="btn btn-warning" href="{{ route('admin.office.setting') }}">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-administrator-layout>
