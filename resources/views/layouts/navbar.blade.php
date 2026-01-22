<button class="toggle-sidebar">
    <i class="fas fa-bars"></i>
</button>

<nav class="sidebar">
    {{-- Sidebar Header --}}
    <div class="sidebar-header">
        <img src="{{ asset('images/logo-sidoarjo.png') }}" alt="Logo" class="sidebar-logo">
        <p class="sidebar-title">Desa Bangah</p>
    </div>

    {{-- Sidebar Navigation --}}
    <ul class="sidebar-nav">
        {{-- Home/Beranda --}}
        <li>
            <a href="{{ route('home') }}" class="@if(request()->routeIs('home')) active @endif">
                <i class="fas fa-home"></i>
                <span>Beranda</span>
            </a>
        </li>

        {{-- Layanan Publik (HANYA UNTUK WARGA - BUKAN ADMIN) --}}
        @auth
            @if(auth()->user()->role === 'warga')
                <li>
                    <a href="{{ route('layanan.publik') }}" class="@if(request()->routeIs('layanan.*')) active @endif">
                        <i class="fas fa-cogs"></i>
                        <span>Layanan Publik</span>
                    </a>
                </li>
            @endif
        @endauth
        @guest
            <li>
                <a href="{{ route('layanan.publik') }}" class="@if(request()->routeIs('layanan.*')) active @endif">
                    <i class="fas fa-cogs"></i>
                    <span>Layanan Publik</span>
                </a>
            </li>
        @endguest

        {{-- Dashboard (only for authenticated users) --}}
        @auth
            <li>
                <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : (auth()->user()->role === 'pendatang' ? route('dashboard.pendatang') : route('dashboard')) }}" 
                   class="@if(request()->routeIs('dashboard', 'admin.dashboard', 'dashboard.pendatang')) active @endif">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endauth

        {{-- Admin Menu Section --}}
        @auth
            @if(auth()->user()->role === 'admin')
                <div class="sidebar-divider"></div>
                <li style="padding: 10px 20px; color: rgba(255, 255, 255, 0.6); font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                    ADMIN PANEL
                </li>
                <li>
                    <a href="{{ route('admin.pendatang.index') }}" 
                       class="@if(request()->routeIs('admin.pendatang.*')) active @endif">
                        <i class="fas fa-user-check"></i>
                        <span>Verifikasi Pendatang</span>
                    </a>
                </li>
            @endif
        @endauth

        <div class="sidebar-divider"></div>
        @auth
            <li>
                <a href="{{ route('profile.show') }}">
                    <i class="fas fa-user-circle"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 20px; color: rgba(255, 255, 255, 0.8); text-decoration: none; font-size: 14px; font-weight: 500; cursor: pointer; transition: all 0.3s ease; border-left: 3px solid transparent; display: flex; align-items: center; gap: 12px;">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </li>
        @else
            <li>
                <a href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Login</span>
                </a>
            </li>

            <li>
                <a href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i>
                    <span>Register</span>
                </a>
            </li>
        @endauth
    </ul>

    {{-- User Profile Section at Bottom --}}
    @auth
    <div class="sidebar-profile">
        <div class="profile-avatar">
            <i class="fas fa-user-circle"></i>
        </div>
        <div class="profile-info">
            <p class="profile-name">{{ auth()->user()->name }}</p>
            <p class="profile-role">
                @if(auth()->user()->role === 'admin')
                    <span class="badge-admin">Admin Desa</span>
                @elseif(auth()->user()->role === 'pendatang')
                    <span class="badge-user">Pendatang ✓</span>
                @else
                    <span class="badge-user">Warga</span>
                @endif
            </p>
        </div>
    </div>
    @endauth
</nav>
