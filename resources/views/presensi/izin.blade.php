@extends('layout.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #008DDA;">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Leave and Sick Application Menu</div>
        <div class="right"></div>
    </div>
<!-- App Header -->
@endsection
@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
    @php
    $messagesuccess = Session::get('success');
    $messageerror = Session::get('error');
    @endphp
    @if (Session::get('success'))
    <div class="alert alert-success">
        {{ $messagesuccess }}
    </div>
    @endif
    @if (Session::get('error'))
    <div class="alert alert-warning">
        {{ $messageerror }}
    </div>
    @endif
    </div>
</div>
<div class="row">
    <div class="col">
        @foreach ($dataizin as $d)
        <ul class="listview image-listview">
            <li>
                <div class="item">
                    <div class="in">
                        <div>
                            <b>{{ date("Y-m-d",strtotime($d->tgl_izin)) }} ({{ $d->status== "s" ? "Sick" : "Paid Leave" }})</b>
                            <small class="text-muted">{{ $d->keterangan }}</small> 
                        </div>
                        @if ($d->status_aproval == 0)
                        <span class="badge bg-warning">Waiting</span>
                        @elseif($d->status_aproval == 1)
                        <span class="badge bg-success">Approved</span>
                        @elseif($d->status_aproval == 2)
                        <span class="badge bg-danger">Decline</span>
                        @endif
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
    </div>
</div>
<div class="fab-button bottom-right" style="margin-bottom:70px">
    <a href="/presensi/buatizin" class="fab">
    <ion-icon name="add-outline"></ion-icon>
    </a>
</div>
@endsection