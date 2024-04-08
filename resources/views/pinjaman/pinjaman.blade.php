@extends('layout.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #008DDA;">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Loan & Payment</div>
    <div class="right"></div>
</div>
<!-- App Header -->
@endsection

@section('content')
<div class="form-group" style="margin-top: 55px;">
    @csrf
    <h2 style = "text-align: center;">Employee Loan List</h2>   
    
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
    <table id="dataTable1" class="display table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Loan Amount</th>
                    <th>Loan Method</th>
                    <th>Installments</th>
                    <th>Loan Date</th>
                    <th>Borrowed Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pinjaman->take(10) as $p)
                    <tr>
                        <td>{{ $p->id_pinjaman }}</td>
                        <td>{{ $p->nama_peminjam }}</td>
                        <td width="20%">Rp. {{ number_format($p->jumlah_pinjaman, 0, ',', '.') }}</td>
                        <td>{{ $p->metode }}</td>
                        <td>{{ $p->angsuran }}</td>
                        <td>{{ $p->tanggal_pinjaman }}</td>
                        <td>{{ $p->waktu_pinjaman }}</td>
                        <td>
                            <a href="{{route('pinjaman.edit', $p->id)}}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('pinjaman.destroy', $p->id)}}" method="POST" style="display: inline-block;"
                            onsubmit="return confirm('Do you really want to delete Loan = {{ $p->id_pinjaman }} ?');">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@if($pinjaman->count() > 10)
    <div class="text-center">
        <a href="#" class="btn btn-secondary">Load More</a>
    </div>
@endif

<a href="/pinjaman/create" class="btn btn-success">Add New Loan</a>
@endsection