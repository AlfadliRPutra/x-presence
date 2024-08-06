<x-administrator-layout>
    @section('title', 'Data intern')

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
                            <h4 class="card-title">Data Peserta Magang</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i>

                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- modal --}}
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold"> New</span>
                                            <span class="fw-light"> Row </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="small">Create a new row using this form, make sure you fill them all
                                        </p>
                                        <form action="{{ route('admin.intern.store') }}" method="POST" id="frmintern">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>NIK</label>
                                                        <input type="text" id="nik" name="nik"
                                                            class="form-control" placeholder="Nomor Induk Kepegawaian">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
                                                    <div class="form-group form-group-default">
                                                        <label>Nama</label>
                                                        <input type="text" id="name" class="form-control"
                                                            name="name" placeholder="Nama Lengkap intern">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Email</label>
                                                        <input type="email" name="email" id="email"
                                                            class="form-control" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pe-0">
                                                    <div class="form-group form-group-default">
                                                        <label>No. HP</label>
                                                        <input type="tel" name="no_hp" id="no_hp"
                                                            class="form-control"
                                                            placeholder="No Handphone Aktif intern">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <select name="role" id="role" class="form-select">
                                                        <option selected disabled>Role</option>
                                                        <option
                                                            value="intern"{{ old('role') == 'intern' ? 'selected' : '' }}>
                                                            intern</option>
                                                        <option
                                                            value="Admin"{{ old('role') == 'Admin' ? 'selected' : '' }}>
                                                            Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="submit" id="addRowButton"
                                                    class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>



                                </div>
                            </div>
                        </div>
                        {{-- end modal --}}

                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Handphone</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Handphone</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($intern as $k)
                                        @php
                                            $path = Storage::url('uploads/intern/' . $k->foto);
                                        @endphp
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->nik }}</td>
                                            <td>{{ $k->name }}</td>
                                            <td>{{ $k->email }}</td>
                                            <td>{{ $k->role }}</td>
                                            <td>{{ $k->no_hp }}</td>
                                            <td>
                                                @if (empty($k->foto))
                                                    <img src="{{ asset('assets/img/no-pictures.png') }}" class="avatar"
                                                        alt="">
                                                @else
                                                    <img src="{{ url($path) }}" class="avatar" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                <div class="flex">
                                                    <span class="me-2">
                                                        <a href="{{ url('/intern/' . $k->id . '/edit') }}"
                                                            class="badge text-bg-warning mt-2" title="Edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icon-tabler-pencil">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                <path d="M13.5 6.5l4 4" />
                                                            </svg>
                                                            Edit
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a href="/intern/{{ $k->id }}/delete"
                                                            class="badge text-bg-danger mt-1" title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="icon icon-tabler icon-tabler-trash">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path d="M4 7l16 0" />
                                                                <path d="M10 11l0 6" />
                                                                <path d="M14 11l0 6" />
                                                                <path
                                                                    d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                            Delete
                                                        </a>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-table-script></x-table-script>
</x-administrator-layout>
