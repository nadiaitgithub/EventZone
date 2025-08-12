<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Management</title>

    {{-- Bootstrap + Icons + Custom CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        main {
            flex: 1;
        }

        .navbar {
            background: linear-gradient(90deg, #363a40, #08633d);
        }

        .navbar-brand, .nav-link, .navbar-dark .navbar-toggler-icon {
            color: #fff !important;
        }

        .navbar-brand:hover, .nav-link:hover {
            text-decoration: underline;
        }

        .card {
            border-radius: 1rem;
        }

        footer {
            background: linear-gradient(to right, #1f4037, #99f2c8);
            color: #ffffff;
            text-align: center;
            padding: 20px 0;
            font-weight: 500;
            letter-spacing: 0.5px;
            box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ auth()->check() && (auth()->user()->is_admin ?? false) ? url('/admin') : url('/') }}">
                <i class="bi bi-calendar2-check-fill me-1"></i> EventHub
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard"><i class="bi bi-person-circle me-1"></i> Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('events.index') }}"><i class="bi bi-calendar-event me-1"></i> Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/events/create"><i class="bi bi-plus-circle me-1"></i> Create Event</a>
                        </li>
                        @if(auth()->user()->is_admin ?? false)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.index') }}"><i class="bi bi-shield-lock-fill me-1"></i> Admin</a>
                            </li>
                        @endif
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-1"></i> Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register"><i class="bi bi-person-plus-fill me-1"></i> Register</a>
                        </li>
                    @else
                        <li class="nav-item d-flex align-items-center px-2 text-white">
                            <i class="bi bi-person-fill me-1"></i> Hello, {{ auth()->user()->name }}
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link text-white" style="display:inline;cursor:pointer;">
                                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                                </button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main>
        <div class="container py-4">
            @yield('content')
        </div>
    </main>

    {{-- Footer --}}
    <footer>
        <p class="mb-0">&copy; {{ date('Y') }} EventHub. All Rights Reserved.</p>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
