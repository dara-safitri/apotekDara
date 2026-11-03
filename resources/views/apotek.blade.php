<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | ApotekDara</title>

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f7f5;
            color: #243c31;
        }

        .topbar {
            background: #205c43;
            color: white;
            padding: 22px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .brand { font-size: 24px; font-weight: 800; }
        .brand span { color: #a9e3bf; }

        .topbar p { font-size: 13px; color: #d1e5d8; margin-top: 5px; }

        .home-link {
            color: white;
            text-decoration: none;
            background: #ffffff20;
            padding: 11px 17px;
            border-radius: 10px;
            font-size: 13px;
        }

        .container { max-width: 1250px; margin: auto; padding: 30px 5%; }

        .welcome { margin-bottom: 25px; }
        .welcome h1 { font-size: 28px; margin-bottom: 8px; }
        .welcome p { color: #78877e; font-size: 14px; }

        .alert {
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            background: #e1f4e7;
            color: #24633e;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat {
            background: white;
            border: 1px solid #e7eee9;
            border-radius: 17px;
            padding: 23px;
            box-shadow: 0 5px 18px #1d4e3610;
        }

        .stat-label { color: #7a8a80; font-size: 13px; }
        .stat-number { font-size: 30px; font-weight: 700; margin-top: 10px; }
        .stat-icon { font-size: 22px; margin-bottom: 12px; }

        .section {
            background: white;
            border: 1px solid #e7eee9;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 18px #1d4e3608;
        }

        .section-title {
            display: flex;
            align-items: center;
            gap: 13px;
            margin-bottom: 22px;
        }

        .section-icon {
            background: #e8f3ec;
            color: #286448;
            width: 45px;
            height: 45px;
            border-radius: 13px;
            display: grid;
            place-items: center;
            font-size: 21px;
        }

        .section-title h2 { font-size: 20px; }
        .section-title p { font-size: 13px; color: #849087; margin-top: 5px; }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 17px;
        }

        .field { display: flex; flex-direction: column; gap: 8px; }
        .field.full { grid-column: 1 / -1; }

        label { font-size: 13px; font-weight: 600; color: #53675b; }

        input, textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #dce6df;
            border-radius: 10px;
            font: inherit;
            font-size: 14px;
            outline: none;
            background: #fcfdfc;
        }

        input:focus, textarea:focus {
            border-color: #4c9875;
            box-shadow: 0 0 0 3px #4c987515;
        }

        textarea { resize: vertical; min-height: 85px; }

        .btn {
            border: 0;
            cursor: pointer;
            padding: 11px 17px;
            border-radius: 9px;
            font: inherit;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary { background: #286448; color: white; }
        .btn-edit { background: #e8f2ff; color: #2763a5; }
        .btn-delete { background: #fff0ef; color: #b83b35; }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 25px 0 13px;
            gap: 10px;
        }

        .table-heading h3 { font-size: 15px; }

        .table-wrap { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 13px;
            min-width: 650px;
        }

        th {
            text-align: left;
            padding: 14px 12px;
            color: #708077;
            background: #f6f9f7;
            font-weight: 600;
        }

        td {
            padding: 14px 12px;
            border-bottom: 1px solid #edf1ee;
            vertical-align: middle;
        }

        .actions { display: flex; gap: 7px; }

        .empty {
            text-align: center;
            color: #8b9890;
            padding: 25px;
        }

        footer {
            text-align: center;
            color: #8b9890;
            padding: 25px;
            font-size: 12px;
        }

        @media (max-width: 700px) {
            .stats { grid-template-columns: 1fr; }
            .form-grid { grid-template-columns: 1fr; }
            .section { padding: 18px; }
            .welcome h1 { font-size: 24px; }
        }
    </style>
</head>

<body>

<header class="topbar">
    <div>
        <div class="brand">Apotek<span>Dara.</span></div>
        <p>Sistem Informasi Manajemen Apotek</p>
    </div>

    <a href="{{ url('/') }}" class="home-link">← Halaman Awal</a>
</header>

<main class="container">

    <div class="welcome">
        <h1>Dashboard Apotek</h1>
        <p>Selamat datang! Kelola data apotek dengan mudah melalui dashboard ini.</p>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="stats">
        <div class="stat">
            <div class="stat-icon">♧</div>
            <div class="stat-label">Total Pelanggan</div>
            <div class="stat-number">{{ $pelanggans->count() }}</div>
        </div>

        <div class="stat">
            <div class="stat-icon">♙</div>
            <div class="stat-label">Total Staf</div>
            <div class="stat-number">{{ $stafs->count() }}</div>
        </div>

        <div class="stat">
            <div class="stat-icon">✚</div>
            <div class="stat-label">Jenis Obat</div>
            <div class="stat-number">{{ $obats->count() }}</div>
        </div>
    </div>

    <!-- DATA PELANGGAN -->
    <section class="section">
        <div class="section-title">
            <div class="section-icon">♧</div>
            <div>
                <h2>Data Pelanggan</h2>
                <p>Tambahkan dan kelola informasi pelanggan apotek.</p>
            </div>
        </div>

        <form action="{{ url('/pelanggan') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="field">
                    <label>Nama Pelanggan</label>
                    <input name="nama" required>
                </div>

                <div class="field">
                    <label>Nomor HP</label>
                    <input name="no_hp" required>
                </div>

                <div class="field full">
                    <label>Alamat</label>
                    <textarea name="alamat" required></textarea>
                </div>

                <div class="field full">
                    <button class="btn btn-primary">+ Simpan Pelanggan</button>
                </div>
            </div>
        </form>

        <div class="table-heading">
            <h3>Daftar Pelanggan</h3>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelanggans as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-edit"
                                   href="{{ url('/pelanggan/'.$p->id.'/edit') }}">Edit</a>

                                <form action="{{ url('/pelanggan/'.$p->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus data pelanggan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="empty">Belum ada data pelanggan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- DATA STAF -->
    <section class="section">
        <div class="section-title">
            <div class="section-icon">♙</div>
            <div>
                <h2>Data Staf Apotek</h2>
                <p>Kelola informasi staf yang bekerja di apotek.</p>
            </div>
        </div>

        <form action="{{ url('/staf') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="field">
                    <label>Nama Staf</label>
                    <input name="nama" required>
                </div>

                <div class="field">
                    <label>Nomor HP</label>
                    <input name="no_hp" required>
                </div>

                <div class="field">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" required>
                </div>

                <div class="field">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" required>
                </div>

                <div class="field full">
                    <label>Alamat</label>
                    <textarea name="alamat" required></textarea>
                </div>

                <div class="field full">
                    <button class="btn btn-primary">+ Simpan Staf</button>
                </div>
            </div>
        </form>

        <div class="table-heading"><h3>Daftar Staf</h3></div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal Lahir</th>
                        <th>Tempat Lahir</th>
                        <th>Nomor HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stafs as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->nama }}</td>
                        <td>{{ $s->alamat }}</td>
                        <td>{{ $s->tanggal_lahir }}</td>
                        <td>{{ $s->tempat_lahir }}</td>
                        <td>{{ $s->no_hp }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-edit"
                                   href="{{ url('/staf/'.$s->id.'/edit') }}">Edit</a>

                                <form action="{{ url('/staf/'.$s->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus data staf ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="empty">Belum ada data staf.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <!-- DAFTAR OBAT -->
    <section class="section">
        <div class="section-title">
            <div class="section-icon">✚</div>
            <div>
                <h2>Daftar Obat</h2>
                <p>Kelola persediaan dan tanggal kedaluwarsa obat.</p>
            </div>
        </div>

        <form action="{{ url('/obat') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="field">
                    <label>Kode Obat</label>
                    <input name="kode_obat" required>
                </div>

                <div class="field">
                    <label>Nama Obat</label>
                    <input name="nama_obat" required>
                </div>

                <div class="field">
                    <label>Stok Obat</label>
                    <input type="number" name="stok" min="0" required>
                </div>

                <div class="field">
                    <label>Tanggal Kedaluwarsa</label>
                    <input type="date" name="tanggal_kadaluwarsa" required>
                </div>

                <div class="field full">
                    <button class="btn btn-primary">+ Simpan Obat</button>
                </div>
            </div>
        </form>

        <div class="table-heading"><h3>Daftar Persediaan Obat</h3></div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Stok</th>
                        <th>Kedaluwarsa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($obats as $o)
                    <tr>
                        <td>{{ $o->id }}</td>
                        <td>{{ $o->kode_obat }}</td>
                        <td>{{ $o->nama_obat }}</td>
                        <td>{{ $o->stok }}</td>
                        <td>{{ $o->tanggal_kadaluwarsa }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-edit"
                                   href="{{ url('/obat/'.$o->id.'/edit') }}">Edit</a>

                                <form action="{{ url('/obat/'.$o->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus data obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="6" class="empty">Belum ada data obat.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</main>

<footer>
    © {{ date('Y') }} ApotekDara · Sistem Informasi Manajemen Apotek
</footer>

</body>
</html>