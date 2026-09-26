<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'CCS Projects' }} | OLFU</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="app-shell d-flex">
    <aside class="sidebar d-flex flex-column flex-shrink-0 p-3">
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none mb-4 px-2"><span class="brand-mark rounded-2 d-flex align-items-center justify-content-center fw-bold">C</span><span class="brand-copy"><strong class="d-block text-dark">CCS Projects</strong><small class="text-secondary">OLFU repository</small></span></a>
        <div class="px-2 mb-2 text-uppercase text-secondary" style="font-size:.65rem;letter-spacing:.1em">Workspace</div>
        <nav class="nav flex-column gap-1">
            <a class="nav-link d-flex align-items-center gap-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><span>▦</span><span class="nav-label">Overview</span></a>
            <a class="nav-link d-flex align-items-center gap-3 {{ request()->routeIs('projects.*') ? 'active' : '' }}" href="{{ route('projects.index') }}"><span>□</span><span class="nav-label">Projects</span></a>
            <a class="nav-link d-flex align-items-center gap-3" href="#"><span>⌁</span><span class="nav-label">Activity</span></a>
            <a class="nav-link d-flex align-items-center gap-3" href="#"><span>◷</span><span class="nav-label">Reviews <span class="badge rounded-pill badge-soft ms-auto">6</span></span></a>
        </nav>
        <div class="px-2 mb-2 mt-4 text-uppercase text-secondary" style="font-size:.65rem;letter-spacing:.1em">Manage</div>
        <nav class="nav flex-column gap-1"><a class="nav-link d-flex align-items-center gap-3" href="#"><span>♙</span><span class="nav-label">People</span></a><a class="nav-link d-flex align-items-center gap-3" href="#"><span>▤</span><span class="nav-label">Reports</span></a><a class="nav-link d-flex align-items-center gap-3" href="#"><span>⚙</span><span class="nav-label">Settings</span></a></nav>
        <div class="mt-auto border-top pt-3 px-2 d-flex align-items-center gap-2"><span class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center" style="width:34px;height:34px;font-size:.8rem">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</span><span class="user-copy"><strong class="d-block" style="font-size:.85rem">{{ auth()->user()->name }}</strong><small class="text-secondary">{{ auth()->user()->role?->label }}</small></span></div>
    </aside>
    <main class="main-content flex-grow-1"><header class="topbar sticky-top px-4 py-3 d-flex align-items-center justify-content-between"><div class="d-flex align-items-center gap-3 text-secondary small"><span class="d-none d-sm-inline">Workspace</span><span>/</span><strong class="text-dark">{{ $title ?? 'Overview' }}</strong></div><div class="d-flex align-items-center gap-3"><button class="btn btn-light border">⌕<span class="d-none d-md-inline ms-2 text-secondary">Search projects</span></button><button class="btn btn-light border">♢</button><div class="vr"></div><form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-link btn-sm text-secondary text-decoration-none">Sign out</button></form></div></header><div class="p-4 p-lg-5">@yield('content')</div></main>
</div>
</body>
</html>