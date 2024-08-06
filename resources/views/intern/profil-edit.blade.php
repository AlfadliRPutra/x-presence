<x-intern-layout>
    @section('title', 'Profile')
    @section('header')
        <div class="appHeader bg-primary text-light">
            <div class="left">
                <a href="" class="headerButton goBack">
                    <ion-icon name="chevron-back-outline"></ion-icon>
                </a>
            </div>
            <div class="pageTitle">Edit Profile</div>
            <div class="right"></div>
        </div>
    @endsection

    <div class="row" style="margin-top: 4rem">
        <div class="col">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <form action="/presensi/{{ $intern->nik }}/updateprofile" method="POST" enctype="multipart/form-data"
        style="margin-top: 1rem">
        @csrf
        <div class="col">
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $intern->name }}" name="name"
                        placeholder="Nama Lengkap" autocomplete="off" />
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="email" class="form-control" value="{{ $intern->email }}" name="email"
                        placeholder="Email" autocomplete="off" />
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control" value="{{ $intern->no_hp }}" name="no_hp"
                        placeholder="No Handphone" autocomplete="off" />
                </div>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        autocomplete="off" />
                </div>
            </div>
            <div class="custom-file-upload" id="fileUpload1" style="height: 100px">
                <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg" />
                <label for="fileuploadInput">
                    <span>
                        <strong>
                            <ion-icon name="cloud-upload-outline"></ion-icon>
                            <i>Tap to Upload</i>
                        </strong>
                    </span>
                </label>
            </div>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <button type="submit" class="btn btn-primary btn-block" style="margin-top: 1rem">
                        <ion-icon name="refresh-outline"></ion-icon>
                        Update
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-intern-layout>
