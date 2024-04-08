@extends('layout.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #008DDA;">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Salary Information</div>
    <div class="right"></div>
</div>
<!-- App Header -->
@endsection

@section('content')
<div class="invoice-container" style="margin-top: 70px; margin-bottom: 70px;">
    <div class="invoice-header">
        <h2 style="text-align: center;">Employee Salary Invoice</h2>
        <p style="text-align: center;">Date: {{ date('Y-m-d') }}</p>
    </div>
    <div class="invoice-form">
        @if($salary->isEmpty())
            <p style="text-align: center;">Sorry you haven't been paid yet.</p>
        @else
            <form>
                @foreach($salary->take(10) as $p)
                <div class="form-group">
                    <label for="id_salary{{ $p->id_salary }}">Id:</label>
                    <input type="text" class="form-control" id="id_salary{{ $p->id_salary }}" value="{{ $p->id_salary }}" readonly>
                </div>
                <div class="form-group">
                    <label for="employee_name{{ $p->id_salary }}">Name:</label>
                    <input type="text" class="form-control" id="employee_name{{ $p->id_salary }}" value="{{ $p->employee_name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="basic_salary{{ $p->id_salary }}">Basic Salary:</label>
                    <input type="text" class="form-control" id="basic_salary{{ $p->id_salary }}" value="{{ $p->basic_salary }}" readonly>
                </div>
                <div class="form-group">
                    <label for="transportation{{ $p->id_salary }}">Transportation:</label>
                    <input type="text" class="form-control" id="transportation{{ $p->id_salary }}" value="{{ $p->transportation }}" readonly>
                </div>
                <div class="form-group">
                    <label for="consumption{{ $p->id_salary }}">Consumption:</label>
                    <input type="text" class="form-control" id="consumption{{ $p->id_salary }}" value="{{ $p->consumption }}" readonly>
                </div>
                <div class="form-group">
                    <label for="family_allowance{{ $p->id_salary }}">Family Allowance:</label>
                    <input type="text" class="form-control" id="family_allowance{{ $p->id_salary }}" value="{{ $p->family_allowance }}" readonly>
                </div>
                <div class="form-group">
                    <label for="positional_allowance{{ $p->id_salary }}">Positional Allowance:</label>
                    <input type="text" class="form-control" id="positional_allowance{{ $p->id_salary }}" value="{{ $p->positional_allowance }}" readonly>
                </div>
                <hr>
                @endforeach
            </form>
        @endif
    </div>
</div>
@endsection