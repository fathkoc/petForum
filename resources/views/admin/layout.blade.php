<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            color: #333;
        }

        header {
            background: #1e293b;
            color: #fff;
            padding: 15px 30px;
            text-align: left;
            font-size: 24px;
        }

        .main {
            display: flex;
            min-height: 90vh;
        }

        .sidebar {
            width: 220px;
            background: #2d3748;
            padding-top: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            color: #cbd5e0;
            text-decoration: none;
            padding: 12px 20px;
            transition: background 0.2s;
        }

        .sidebar a:hover {
            background: #4a5568;
        }

        .content {
            flex: 1;
            padding: 30px;
            background: #fff;
            border-top-left-radius: 10px;
            margin: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        footer {
            text-align: center;
            padding: 15px;
            background: #1e293b;
            color: #fff;
        }

        @media (max-width: 768px) {
            .main {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                display: flex;
                overflow-x: auto;
            }

            .sidebar ul {
                display: flex;
                width: 100%;
                flex-direction: row;
                gap: 10px;
                padding: 10px;
                justify-content: space-around;
            }

            .content {
                margin: 10px;
            }
        }
    </style>
</head>
<body>
    <header>
        Yönetim Paneli
    </header>

    <div class="main">
        <nav class="sidebar">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('admin.users') }}">Kullanıcılar</a></li>
                <li><a href="{{ route('admin.topics') }}">Sorular</a></li>
                <li><a href="{{ route('admin.reports.index') }}">Şikayetler</a></li>
                <li><a href="{{ route('admin.reports.comments') }}">Yorum Şikayetleri</a></li>
                <li><a href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Çıkış Yap</a></li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>

        <section class="content">
            @yield('content')
        </section>
    </div>

    <footer>
        &copy; {{ date('Y') }} Admin Panel
    </footer>
</body>
</html>
