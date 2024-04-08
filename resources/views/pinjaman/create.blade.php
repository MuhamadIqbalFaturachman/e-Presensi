@extends('layout.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #008DDA;">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Add Loan</div>
    <div class="right"></div>
</div>
<!-- App Header -->
@endsection

@section('content')<div class="container" style="margin-top: 70px; margin-bottom: 70px;" >
    <h2 style = "text-align: center;">Menu for Adding Employee Loan Data</h2>
    <form method="POST" action="/pinjaman/store">
        @csrf
        <div class="form-group">
            <label for="id_pinjaman">Loan Id</label>
            <input type="text" class="form-control" id="id_pinjaman" name="id_pinjaman">
        </div>
        <div class="form-group">
            <label for="nama_peminjam">Employee</label>
            <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam">
        </div>
        <div class="form-group">
            <label for="jumlah_pinjaman">Loan Amount</label>
            <input type="text" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman">
        </div>
        <div class="form-group">
            <label for="metode">Method</label>
            <input type="text" class="form-control" id="metode" name="metode">
        </div>
        <div class="form-group">
            <label for="angrusan">Installments</label>
            <input type="text" class="form-control" id="angsuran" name="angsuran">
        </div>
        <div class="form-group">
            <label for="tanggal_pinjaman">Loan Date</label>
            <input type="date" class="form-control" id="tanggal_pinjaman" name="tanggal_pinjaman">
        </div>
        <div class="form-group">
            <label for="waktu_pinjaman">Loan Time</label>
            <input type="time" class="form-control" id="waktu_pinjaman" name="waktu_pinjaman">
        </div>
        <button type="submit" class="btn btn-primary">Add Loan</button>
    </form>
</div>
@endsection
