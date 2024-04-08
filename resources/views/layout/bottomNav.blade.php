<div class="appBottomMenu">
        <a href="/dashboard" class="item {{ request()->is('dashboard') ? 'active' : '' }}">
            <div class="col">
            <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="/presensi/histori" class="item {{ request()->is('presensi/histori') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="document-text-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
                <strong>Attendance History</strong>
            </div>
        </a>
        <a href="/presensi/create" class="item {{ request()->is('presensi/create') ? 'active' : '' }}">
            <div class="col">
                <div class="action-button large" style="background-color: #008DDA;">
                    <ion-icon name="camera" role="img" class="md hydrated" aria-label="add outline"></ion-icon>
                </div>
            </div>
        </a>
        <a href="/presensi/izin" class="item {{ request()->is('presensi/izin') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="calendar-outline" role="img" class="md hydrated"
                    aria-label="document text outline"></ion-icon>
                <strong>Permission, Leave, Sickness</strong>
            </div>
        </a>
        <a href="/editprofile" class="item {{ request()->is('editprofile') ? 'active' : '' }}">
            <div class="col">
                <ion-icon name="cog-outline"></ion-icon>
                <strong>Settings</strong>
            </div>
        </a>
    </div>