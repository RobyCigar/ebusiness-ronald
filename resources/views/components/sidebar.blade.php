<!-- Bagian Navbar Sidebar Samping -->
<div class="offcanvas offcanvas-start sidebar-nav" id="sidebar" style="background-color: hsl(0, 0%, 0%);">
    <nav class="navbar-dark" style="font-size: 18px;">
        <ul class="navbar-nav">
            <li>
                <a href="#" class="nav-link px-4 mt-4 active" style="font-size: 25px;">
                    <span>Kasironald</span>
                    </i>
                </a>
            </li>
            <li>
                <a href="{{route('dashboard')}}" class="nav-link px-4 mt-4 active">
                    <i class="fa-solid fa-bars"></i>
                    <span>Beranda</span>
                    </i>
                </a>
            </li>
           </li>
            <li>
                <a href="{{route('pesanan.tambah')}}" class="nav-link px-4 mt-4 active">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Pesan</span>
                </a>
            </li>
            <li>
                <a href="{{route('pegawai.index')}}" class="nav-link px-4 mt-3  active">
                    <i class="fa-solid fa-user-group"></i>
                    <span>Pegawai</span>
                </a>
            </li>
            <li>
                <a href="{{route('menu.index')}}" class="nav-link px-4 mt-3  active">
                    <i class="fa-solid fa-square-plus"></i>
                    <span>Daftar Menu</span>
                </a>
            </li>
            <li>
                <a href="{{route('transaksi.index')}}" class="nav-link px-4 mt-3  active">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Laporan Keuangan</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!-- End Bagian Navbar Sidebar Samping -->
