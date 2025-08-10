 @php
     $role = Auth::user()->role;
 @endphp

 <div>
     <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion sticky-top" id="accordionSidebar">
         <!-- Sidebar - Brand -->
         <div class="sidebar-brand d-flex flex-column align-items-center justify-content-center mt-4 mb-4">
             <div class="sidebar-brand-icon d-flex align-items-center justify-content-center" style="gap: 5px;">
                 <img src="{{ asset('image/LOGO KEJAKSAAN.png') }}" alt="Logo Kejaksaan" style="height: 60px;">
                 <img src="{{ asset('image/logo_bpa.png') }}" alt="Logo BPA" style="height: 50px;">
             </div>
             <div class="sidebar-brand-text text-center mt-2">
                 <sup>Pemulihan Aset</sup>
             </div>
         </div>




         <!-- Divider -->
         <hr class="sidebar-divider my-0">
         <!-- Nav Item - Dashboard -->
         <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('dashboard') }}">
                 <i class="fas fa-fw fa-tachometer-alt"></i>
                 <span>Dashboard</span></a>
         </li>
         <li class="nav-item {{ request()->routeIs('perkara.index') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('perkara.index') }}">
                 <i class="fas fa-fw fa-regular fa-list-ol" aria-hidden="true"></i>
                 <span>Daftar Perkara</span></a>
         </li>
         @if ($role !== 'kajati')
             <li class="nav-item {{ request()->routeIs('perkara.create') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('perkara.create') }}">
                     <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                     <span>Tambah Perkara</span></a>
             </li>
         @endif
         @if ($role !== 'kajati')
             <li class="nav-item {{ request()->routeIs('barang-rampasan.index') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('barang-rampasan.index') }}">
                     <i class="fas fa-fw fa-box" aria-hidden="true"></i>
                     <span>Barang Rampasan</span></a>
             </li>
         @endif
         @if ($role !== 'kajati' && $role !== 'validator')
             <li class="nav-item {{ request()->routeIs('label.index') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('label.index') }}">
                     <i class="fas fa-fw fa-qrcode"></i>
                     <span>Label Generator</span>
                 </a>
         @endif
         <li class="nav-item {{ request()->routeIs('pnbp.index') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('pnbp.index') }}">
                 <i class="fas fa-fw fa-dollar-sign" aria-hidden="true"></i>
                 <span>PNBP</span></a>
         </li>

         <li class="nav-item {{ request()->routeIs('rekap-barang-rampasan.*') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('rekap-barang-rampasan.index') }}">
                 <i class="fas fa-fw fa-file-alt"></i>
                 <span>Rekap Barang Rampasan</span>
             </a>
         </li>
         <li class="nav-item {{ request()->routeIs('tunggakan.index') ? 'active' : '' }}">
             <a class="nav-link" href="{{ route('tunggakan.index') }}">
                 <i class="fas fa-fw fa-chart-line"></i>
                 <span>Data Tunggakan</span>
             </a>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider">

         <li class="nav-item">
             <form method="POST" action="{{ route('logout') }}">
                 @csrf
                 <button type="submit" class="dropdown-item nav-link"
                     style="border: none; background: none; padding: 0; margin: 0;">
                     <i
                         class="fas fa-sign-out-alt  fa-fw ml-3 my-4 group-hover:text-white transition-colors duration-100 "></i>
                     Logout
                 </button>
             </form>
         </li>
         @if ($role === 'super admin')
             <li class="nav-item {{ request()->routeIs('akun.index') ? 'active' : '' }}">
                 <a class="nav-link" href="{{ route('akun.index') }}">
                     <i class="fas fa-fw fa-user" aria-hidden="true"></i>
                     <span>Kelola Akun</span></a>
             </li>
         @endif

         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>
     </ul>

 </div>
