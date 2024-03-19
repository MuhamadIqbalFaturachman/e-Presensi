@extends('layout.presensi')
@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #F875AA;">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Form Izin / Sakit</div>
        <div class="right"></div>
    </div>
<!-- App Header -->
@endsection
@section('content')
<form method="POST" action="/presensi/storeizin" id="frmIzin" name="frmIzin">
    @csrf
    <div class="form-group">
    <input type="date" name="tanggal" id="tgl_izin" style="margin-top: 70px;">
    <div class="form-group" style="margin-top: 10px;">
        <select name="status" id="status" class="form-control">
            <option value="">Izin/Sakit</option>
            <option value="i">Izin</option>
            <option value="s">Sakit</option>
        </select>
    </div>
    </div>

    <div class="form-group">
        <textarea name="keterangan" id="keterangan" cols="30" rows="5" placeholder="Keterangan" class="w-100"></textarea>
    </div>
    
    <div class="form-group">
        <button type="submit" class="btn btn-success w-100">Kirim</button>
    </div>
</form>

@push('myscript')
<script>
    $("#frmIzin").submit(function(){
        var tgl_izin = $("#tgl_izin").val();
        var status = $("#status").val();
        var keterangan = $("#keterangan").val();
        if(tgl_izin === ""){
            Swal.fire({
            title: 'Error!',
            text: 'Maaf tanggal harus diisi',
            icon: 'error',
            })
            return false;
        } else if(status === ""){
            Swal.fire({
            title: 'Error!',
            text: 'Maaf status harus diisi',
            icon: 'error',
            })
            return false;
        } else if(keterangan === ""){
            Swal.fire({
            title: 'Error!',
            text: 'Maaf keterangan harus diisi',
            icon: 'error',
            })
            return false;
        }
    });
</script>
@endpush
@endsection