@extends('layout.presensi')
@section('content')
<div class="section" id="user-section" style="background-color: #008DDA;">
            <div id="user-detail">
                <div class="avatar">
                    @if(!empty(Auth::guard('magang')->user()->foto))
                    @php
                        $path = Storage::url('uploads/magang/'.Auth::guard('magang')->user()->foto);
                    @endphp
                    <img src="{{ url($path) }}" alt="avatar" class="imaged w64 rounded">
                    @else
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
                    @endif
                </div>
                <div id="user-info">
                    <h3 id="user-name">{{ Auth::guard('magang')->user()->nama_lengkap }}</h3>
                    <span id="user-role">{{ Auth::guard('magang')->user()->bagian }}</span>
                </div>
            </div>
        </div>

        <div class="section" id="menu-section">
            <div class="card">
                <div class="card-body text-center">
                    <div class="list-menu">
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="/pinjaman/pinjaman" class="green" style="font-size: 40px;">
                                    <ion-icon name="card-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Loan</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="/task/index" class="pimary" style="font-size: 40px;">
                                    <ion-icon name="code-working-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">My Task</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="/slipgaji/index" class="danger" style="font-size: 40px;">
                                    <ion-icon name="wallet-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Salary</span>
                            </div>
                        </div>
                        <div class="item-menu text-center">
                            <div class="menu-icon">
                                <a href="/billing/index" class="warning" style="font-size: 40px;">
                                    <ion-icon name="cash-outline"></ion-icon>
                                </a>
                            </div>
                            <div class="menu-name">
                                <span class="text-center">Billing</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group" style="margin-top: 90px;">
            @csrf

            <div id="rekappresensi">
                <h3 style = "text-align: center;">Monthly Absence Recap {{ $namabulan[$bulanini] }} {{ $tahunini }}</h3>
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 16px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top:4px; right:10px; font-size:0,6rem; z-index:999">{{ $rekappresensi->jmlhadir }}</span>
                            <ion-icon name="accessibility-outline" style="font-size: 1.6rem; color: blue"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; color: blue">Present</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 16px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top:4px; right:10px; font-size:0,6rem; z-index:999">0</span>
                            <ion-icon name="reader-outline" style="font-size: 1.6rem; color: orange"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; color: orange">Leave</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 16px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top:4px; right:10px; font-size:0,6rem; z-index:999">0</span>
                            <ion-icon name="medkit-outline" style="font-size: 1.6rem; color: green"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; color: green">Sick</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body text-center" style="padding: 16px 12px !important">
                            <span class="badge bg-danger" style="position: absolute; top:4px; right:10px; font-size:0,6rem; z-index:999">{{ $rekappresensi->jmltelat }}</span>
                            <ion-icon name="time-outline" style="font-size: 1.6rem; color: red"></ion-icon>
                            <br>
                            <span style="font-size: 0.8rem; color: red">Late</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="presencetab mt-2">
                <div class="tab-pane fade show active" id="pilled" role="tabpanel">
                    <ul class="nav nav-tabs style1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                                This Month
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                                Leaderboard
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content mt-2" style="margin-bottom:100px;">
                    <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach($historibulanini as $d)
                            @php
                            $path = Storage::url('uploads/absensi/'.$d->foto_in);
                            @endphp
                            <li>
                                <div class="item">
                                    <div class="icon-box bg-primary">
                                        <img src="{{ url($path) }}" alt="" class="imaged w64">
                                    </div>
                                    <div class="in">
                                        <div>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</div>
                                        <span class="badge {{ $d->jam_in < '08:00' ? 'bg-success' : 'bg-danger' }}">{{ $d->jam_in }}</span>
                                        <span class="badge badge-primary">{{ $d->jam_out }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <ul class="listview image-listview">
                            @foreach ($leaderboard as $d)
                            <li>
                                <div class="item">
                                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image">
                                    <div class="in">
                                        <div>
                                            <b>{{ $d->nama_lengkap }}</b>
                                        </div>
                                        <span class="badge {{ $d->jam_in < '08:00' ? 'bg-success' : 'bg-danger' }}">{{ $d->jam_in }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="container" style = "margin-bottom: 70px;">
                <h3 style = "text-align: center;">Employee Task</h3>               
                @if(session('success'))
                    <div>{{ session('success') }}</div>
                @endif

                @if($task->isEmpty())
                <p style = "text-align: center;">There are no assignments for now.</p>
                @else
                <div class="container">
                        @csrf
                        <div class="form-group">
                        <h2>{{ $id_tugas }}</h2>
                        </div>
                        <div class="form-group">
                        <h2>{{ $tugas }}</h2>
                        </div>
                        <div class="form-group">
                        <h2>{{ $jumlah_tugas }}</h2>
                        </div>
                        <div class="form-group">
                        <h2>{{ $status }}</h2>
                        </div>
                </div>
                @endif
                </div>
            </div>
        </div>
@endsection