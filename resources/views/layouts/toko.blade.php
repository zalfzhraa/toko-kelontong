<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Toko Pak Wowok')</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, sans-serif; background: #f3f4f6; color: #1f2937; }
        nav { background: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.08); padding: 14px 24px; display: flex; gap: 20px; align-items: center; }
        nav .brand { font-weight: 700; font-size: 18px; margin-right: auto; }
        nav a { text-decoration: none; color: #6b7280; font-weight: 500; }
        nav a.active { color: #4f46e5; }
        .container { max-width: 960px; margin: 24px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 16px; padding: 24px; box-shadow: 0 4px 14px rgba(0,0,0,.06); margin-bottom: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; gap: 12px; flex-wrap: wrap; }
        h1, h2 { margin: 0; }
        .btn { display: inline-block; background: #4f46e5; color: #fff; border: 0; padding: 9px 16px; border-radius: 10px; text-decoration: none; cursor: pointer; font-size: 14px; }
        .btn-gray { background: #e5e7eb; color: #374151; }
        .btn-red { background: #dc2626; }
        .btn-sm { padding: 6px 12px; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #e5e7eb; text-align: left; padding: 10px 12px; }
        th:first-child { border-radius: 10px 0 0 10px; } th:last-child { border-radius: 0 10px 10px 0; }
        td { padding: 10px 12px; border-bottom: 1px solid #f3f4f6; }
        .empty { text-align: center; color: #9ca3af; padding: 24px; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 20px; }
        .stat { background: #fff; border-radius: 16px; padding: 20px; box-shadow: 0 4px 14px rgba(0,0,0,.06); }
        .stat small { color: #6b7280; } .stat strong { display: block; font-size: 28px; margin-top: 6px; }
        .badge { padding: 3px 10px; border-radius: 999px; font-size: 12px; font-weight: 600; }
        .badge-green { background: #dcfce7; color: #166534; }
        .badge-orange { background: #ffedd5; color: #9a3412; }
        .badge-red { background: #fee2e2; color: #991b1b; }
        .alert { background: #dcfce7; color: #166534; padding: 12px 16px; border-radius: 10px; margin-bottom: 16px; }
        label { display: block; font-weight: 600; margin: 14px 0 6px; }
        input, select { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 10px; font-size: 14px; }
        .error { color: #dc2626; font-size: 13px; }
        .search { display: flex; gap: 8px; }
        .search input { width: 220px; }
        .actions { display: flex; gap: 6px; }
        dl { display: grid; grid-template-columns: 140px 1fr; gap: 10px 16px; }
        dt { color: #6b7280; } dd { margin: 0; font-weight: 500; }
    </style>
    @stack('styles')
</head>
<body>
    <nav>
        <span class="brand">Toko Pak Wowok</span>
        <a href="{{ route('toko.dashboard') }}" class="{{ request()->routeIs('toko.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Produk</a>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
