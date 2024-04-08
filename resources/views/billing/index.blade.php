@extends('layout.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #008DDA;">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Billing</div>
    <div class="right"></div>
</div>
<!-- App Header -->
@endsection

@section('content')
<div class="form-group" style="margin-top: 70px; margin-bottom: 70px;">
@csrf
<h2 style = "text-align: center;">Loan Maturity Data</h2>
    
@if($bills->isEmpty())
    <p style = "text-align: center;">There is no data on loans that are due.</p>
@else
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Loan</th>
                <th>Installments</th>
                <th>Due Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $index => $bills)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $bills->loan }}</td>
                    <td>{{ $bills->installments }}</td>
                    <td>{{ $bills->due_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@if($bills->count() > 10)
    <div class="text-center">
        <a href="#" class="btn btn-secondary">Load More</a>
    </div>
@endif
</div>
@endsection