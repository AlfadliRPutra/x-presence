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
                            <form action="{{ route('admin.office.setting.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Lokasi Kantor">Lokasi Kantor</label>
                                            <input type="text" id="Lokasi Kantor" name="location_office"
                                                placeholder="{{ $loc_office->location_office }}" class="form-control"
                                                value="{{ $loc_office->location_office }}" />
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="radius">Radius</label>
                                            <input type="text" id="radius" name="radius"
                                                placeholder="{{ $loc_office->radius }}" class="form-control"
                                                value="{{ $loc_office->radius }}" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class="btn btn-danger" href="{{ route('admin.office') }}">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-administrator-layout>
