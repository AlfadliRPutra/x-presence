<x-administrator-layout>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Profil</div>
                    </div>
                    <div class="card-body">
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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('intern.update', $intern->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" name="name"
                                            placeholder="{{ $intern->name }}" class="form-control"
                                            value="{{ old('nama') }}" />
                                        @error('nama')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" id="email" name="email" placeholder="email"
                                            class="form-control" value="{{ old('email') }}" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" id="nik" name="nik"
                                            placeholder="Nomor Induk Kependudukan" class="form-control"
                                            value="{{ old('nik') }}" />
                                        @error('nik')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="handphone">No Handphone</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon3">+62</span>
                                            <input type="tel" class="form-control" placeholder="No Handphone"
                                                id="handphone" name="no_hp" value="{{ old('no_handphone') }}"
                                                aria-describedby="basic-addon3" />
                                        </div>
                                        @error('no_hp')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <div class="col-12">

                                            <select name="role" id="role" class="form-select">
                                                <option @if ($intern->role == 'Intern') selected @endif
                                                    value="Intern">Intern</option>
                                                <option @if ($intern->role == 'Admin') selected @endif
                                                    value="Admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="btn btn-success">Submit</button>
                                <a class="btn btn-danger" href="{{ route('admin.intern') }}">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-administrator-layout>
