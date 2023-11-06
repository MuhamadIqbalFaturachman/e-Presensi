@if($histori->isEmpty())
<div class="alert alert-outline-danger text-center">
    <p>Maaf tidak ada data untuk ditampilkan</p>
</div>
@endif
@foreach ($histori as $d)
<ul class="listview image-listview">
    <li>
        <div class="item">
            @php
                $path = Storage::url('uploads/absensi/');
            @endphp
            <img src="{{ url($path) }}" alt="image" class="image">
            <div class="in">
                <div>
                    <b>{{ date("d-m-Y",strtotime($d->tgl_presensi)) }}</b>
                </div>
                <span class="badge {{ $d->jam_in < '08:00' ? 'bg-success' : 'bg-danger' }}">{{ $d->jam_in }}</span>
                <span class="badge badge-primary">{{ $d->jam_out }}</span>
            </div>
        </div>
    </li>
</ul>
@endforeach