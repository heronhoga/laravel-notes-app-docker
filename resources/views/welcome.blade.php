@include('sweetalert2::index')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    @vite('resources/css/app.css') {{-- If Tailwind + Vite is installed --}}
    <style>
        body {
            font-family: sans-serif;
            background: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            padding: 2rem;
            text-align: center;
            max-width: 500px;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #111827;
        }
        p {
            color: #4b5563;
            margin-bottom: 2rem;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        a {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            background: #2563eb;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s;
        }
        a:hover {
            background: #1d4ed8;
        }
        .secondary {
            background: #6b7280;
        }
        .secondary:hover {
            background: #4b5563;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Welcome to Notes App 📒</h1>
        <p>Capture your thoughts and ideas anywhere, anytime.</p>

        <div class="buttons">
            @auth
                <a href="{{ route('notes.index') }}">View My Notes</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="secondary" style="border:none; cursor:pointer;">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}" class="secondary">Register</a>
            @endauth
        </div>
    </div>
</body>
</html>
