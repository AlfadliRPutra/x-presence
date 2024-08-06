<x-intern-layout>
    @section('title', 'Dashboard')
    <div class="section" id="user-section">
        <div id="user-detail">
            <div class="avatar">
                <img src="{{ asset('storage/photo-user/' . Auth::user()->foto) }}" alt="avatar"
                    style="width: 4.5rem; height: 4.5rem; object-fit: cover; border-radius: 50%;" class="imaged">
            </div>
            <div id="user-info">
                <h2 id="user-name">{{ Auth::user()->name }}</h2>
                <span id="user-role">{{ Auth::user()->role }}</span>
                <span class="text-white">|</span>
                <a class="text-warning" href="{{ route('logout') }}">
                    <ion-icon style="font-size:1rem;" name="log-in-outline"></ion-icon>Logout
                </a>
            </div>
        </div>
    </div>

    <div class="section" id="menu-section">
        <div class="card">
            <div class="card-body text-center">
                <div class="list-menu">
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/editprofile" class="green" style="font-size: 40px;">
                                <ion-icon name="person-sharp"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Profil</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="{{ url('/venue/index.html') }}" class="danger" style="font-size: 40px;">
                                <ion-icon name="calendar-number"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Fasilitas</span>
                        </div>
                    </div>

                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="/presensi/history" class="warning" style="font-size: 40px;">
                                <ion-icon name="document-text"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Histori</span>
                        </div>
                    </div>
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="
                            {{-- {{ route('intern.unit') }} --}}
                             "
                                class="cyan" style="font-size: 40px;">
                                <ion-icon name="easel-outline"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Unit<br>Telkom</span>
                        </div>
                    </div>

                    <!-- Tambahkan tombol untuk struktur organisasi -->
                    <div class="item-menu text-center">
                        <div class="menu-icon">
                            <a href="
                            {{-- {{ route('intern.struktur-organisasi') }} --}}
                            "
                                class="blue" style="font-size: 40px;">
                                <ion-icon name="business"></ion-icon>
                            </a>
                        </div>
                        <div class="menu-name">
                            <span class="text-center">Struktur<br>Organisasi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-2" id="presence-section">
        <div class="todaypresence">
            <div class="row">
                <div class="col-6">
                    <div class="card gradasigreen">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($presensiToday != null)
                                        @php
                                            $path = Storage::url('uploads/presensi/' . $presensiToday->foto_in);
                                        @endphp
                                        <img class="imaged w48" src="{{ url($path) }}" alt="">
                                    @else
                                        <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Masuk</h4>
                                    <span>{{ $presensiToday != null ? $presensiToday->in_hour : 'Belum Presensi' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card gradasired">
                        <div class="card-body">
                            <div class="presencecontent">
                                <div class="iconpresence">
                                    @if ($presensiToday != null && $presensiToday->out_hour != null)
                                        @php
                                            $path = Storage::url('uploads/presensi/' . $presensiToday->foto_out);
                                        @endphp
                                        <img class="imaged w48" src="{{ url($path) }}" alt="">
                                    @else
                                        <ion-icon name="camera"></ion-icon>
                                    @endif
                                </div>
                                <div class="presencedetail">
                                    <h4 class="presencetitle">Pulang</h4>
                                    <span>{{ $presensiToday != null && $presensiToday->out_hour != null ? $presensiToday->out_hour : 'Belum Pulang' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="rekappresensi">
            <h2>Rekap Presensi Bulan {{ $nameMonth[$thisMonth] }} Tahun {{ $thisYear }}</h2>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding:16px 12px !important; line-height:0.8rem;">
                            <span class="badge bg-danger"
                                style="position:absolute; top:3px; right:10px; font-size:0.6rem; z-index:999">{{ $rekapPresensi->jmlhadir }}</span>
                            <ion-icon name="accessibility-outline" style="font-size:1.6rem;" class="text-primary mb-1">
                            </ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Hadir</span>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding:16px 12px !important; line-height:0.8rem;">
                            <span class="badge bg-danger"
                                style="position:absolute; top:3px; right:10px; font-size:0.6rem; z-index:999">{{ $rekapizin->jmlizin }}</span>
                            <ion-icon name="newspaper-outline" style="font-size:1.6rem;" class="text-success mb-1">
                            </ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Izin</span>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding:16px 12px !important; line-height:0.8rem;">
                            <span class="badge bg-danger"
                                style="position:absolute; top:3px; right:10px; font-size:0.6rem; z-index:999">{{ $rekapizin->jmlsakit }}</span>
                            <ion-icon name="medkit-outline" style="font-size:1.6rem;" class="text-warning mb-1">
                            </ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Sakit</span>
                        </div>
                    </div>
                </div>

                <div class="col-3">
                    <div class="card">
                        <div class="card-body text-center" style="padding:16px 12px !important; line-height:0.8rem;">
                            <span class="badge bg-danger"
                                style="position:absolute; top:3px; right:10px; font-size:0.6rem; z-index:999">{{ $rekapPresensi->jmlterlambat }}</span>
                            <ion-icon name="alarm-outline" style="font-size:1.6rem;" class="text-danger mb-1">
                            </ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; font-weight:500">Telat</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="presencetab mt-2">
            <h2>History Presensi</h2>
            <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                <ul class="nav nav-tabs style1" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                            Bulan Ini
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content mt-2" style="margin-bottom:100px;">
                <div class="tab-pane fade show active" id="home" role="tabpanel">
                    <ul class="listview image-listview">
                        @foreach ($historyThisMonth as $history)
                            @php
                                $path = Storage::url('uploads/presensi/' . $history->foto_in);
                            @endphp
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                        <ion-icon name="finger-print-outline"></ion-icon>
                                    </div>
                                    <div class="in">
                                        <div>{{ date('d-m-Y', strtotime($history->date_attendance)) }}</div>
                                        <span class="badge badge-success">{{ $history->in_hour }}</span>
                                        <span
                                            class="badge badge-danger">{{ $presensiToday != null && $history->out_hour != null ? $history->out_hour : 'Belum Pulang' }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-intern-layout>
