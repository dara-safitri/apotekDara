<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | ApotekDara</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f5f8f5;
            color: #173b2d;
            min-height: 100vh;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 8%;
        }

        .brand {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .brand span {
            color: #4c9875;
        }

        .nav-label {
            color: #668273;
            font-size: 14px;
        }

        .hero {
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 50px 8%;
        }

        .hero-content {
            max-width: 750px;
            text-align: center;
        }

        .welcome-label {
            display: inline-block;
            background: #e0eee5;
            color: #347252;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 25px;
        }

        h1 {
            font-size: clamp(38px, 6vw, 68px);
            line-height: 1.15;
            margin-bottom: 20px;
            letter-spacing: -2px;
        }

        h1 span {
            color: #4c9875;
        }

        .description {
            color: #71857a;
            font-size: 17px;
            line-height: 1.8;
            max-width: 600px;
            margin: 0 auto 35px;
        }

        .enter-button {
            display: inline-block;
            background: #286448;
            color: white;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 14px;
            font-weight: 600;
            box-shadow: 0 8px 20px #28644825;
            transition: 0.3s;
        }

        .enter-button:hover {
            background: #1c4d35;
            transform: translateY(-3px);
        }

        .features {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 45px;
        }

        .feature {
            background: white;
            border: 1px solid #e4ece6;
            border-radius: 14px;
            padding: 16px 22px;
            color: #557364;
            font-size: 14px;
        }

        footer {
            text-align: center;
            color: #8b9c92;
            font-size: 12px;
            padding: 25px;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 22px 6%;
            }

            .hero {
                padding: 35px 6%;
            }

            .description {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">Apotek<span>Dara.</span></div>
        <div class="nav-label">Sistem Informasi Apotek</div>
    </nav>

    <main class="hero">
        <div class="hero-content">

            <div class="welcome-label">
                ✦ Selamat Datang di ApotekDara
            </div>

            <h1>
                Mengelola Apotek<br>
                Jadi Lebih <span>Mudah.</span>
            </h1>

            <p class="description">
                Selamat datang di sistem informasi ApotekDara.
                Kelola data pelanggan, staf apotek, dan persediaan
                obat dengan lebih mudah, rapi, dan efisien.
            </p>

            <a href="{{ url('/apotek') }}" class="enter-button">
                Masuk ke ApotekDara &nbsp; →
            </a>

            <div class="features">
                <div class="feature">♧ Data Pelanggan</div>
                <div class="feature">♙ Data Staf</div>
                <div class="feature">✚ Manajemen Obat</div>
            </div>

        </div>
    </main>

    <footer>
        © {{ date('Y') }} ApotekDara · Sistem Informasi Manajemen Apotek
    </footer>

</body>
</html>