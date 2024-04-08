@extends('layout.presensi')

@section('header')
<!-- App Header -->
<div class="appHeader text-light" style="background-color: #008DDA;">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">My Task</div>
    <div class="right"></div>
</div>
<!-- App Header -->
@endsection

@section('content')
<div class="container" style="margin-top: 70px; margin-bottom: 70px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee Task Menu</div>

                <div class="col">
                    <div class="card-body">
                        <form method="POST" action="{{ route('task.submit') }}">
                            @csrf

                            <div class="form-group">
                                <label for="id_tugas">Task Id</label>
                                <input type="text" class="form-control" id="id_tugas" name="id_tugas">
                            </div>

                            <div class="form-group">
                                <label for="tugas">Task</label>
                                <input type="text" class="form-control" id="tugas" name="tugas">
                            </div>

                            <div class="form-group">
                                <label for="jumlah_tugas">Number of Task</label>
                                <input type="text" class="form-control" id="jumlah_tugas" name="jumlah_tugas">
                            </div>

                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" name="status">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection