<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data | ApotekDara</title>

    <style>
        * { box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f4f7f5;
            color: #243c31;
            padding: 35px 15px;
        }

        .card {
            max-width: 650px;
            margin: auto;
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 30px #1d4e3610;
        }

        h1 { font-size: 25px; margin-bottom: 8px; }
        p { color: #7a8a80; margin-bottom: 25px; font-size: 14px; }

        .field { margin-bottom: 18px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        input, textarea {
            width: 100%;
            padding: 13px;
            border: 1px solid #dce6df;
            border-radius: 10px;
            font: inherit;
        }

        textarea { min-height: 90px; }

        button, a {
            display: inline-block;
            padding: 12px 18px;
            border: 0;
            border-radius: 10px;
            text-decoration: none;
            font: inherit;
            font-size: 13px;
            cursor: pointer;
        }

        button { background: #286448; color: white; }
        a { background: #edf2ee; color: #456354; margin-left: 8px; }
    </style>
</head>

<body>
    <div class="card">
        <h1>Edit {{ ucfirst($jenis) }}</h1>
        <p>Perbarui informasi {{ $jenis }} pada sistem ApotekDara.</p>

        <form action="{{ url('/'.$jenis.'/'.$data->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if($jenis === 'pelanggan')
                <div class="field">
                    <label>Nama Pelanggan</label>
                    <input name="nama" value="{{ $data->nama }}" required>
                </div>

                <div class="field">
                    <label>Nomor HP</label>
                    <input name="no_hp" value="{{ $data->no_hp }}" required>
                </div>

                <div class="field">
                    <label>Alamat</label>
                    <textarea name="alamat" required>{{ $data->alamat }}</textarea>
                </div>

            @elseif($jenis === 'staf')
                <div class="field">
                    <label>Nama Staf</label>
                    <input name="nama" value="{{ $data->nama }}" required>
                </div>

                <div class="field">
                    <label>Nomor HP</label>
                    <input name="no_hp" value="{{ $data->no_hp }}" required>
                </div>

                <div class="field">
                    <label>Tempat Lahir</label>
                    <input name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                </div>

                <div class="field">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                           value="{{ $data->tanggal_lahir }}" required>
                </div>

                <div class="field">
                    <label>Alamat</label>
                    <textarea name="alamat" required>{{ $data->alamat }}</textarea>
                </div>

            @else
                <div class="field">
                    <label>Kode Obat</label>
                    <input name="kode_obat" value="{{ $data->kode_obat }}" required>
                </div>

                <div class="field">
                    <label>Nama Obat</label>
                    <input name="nama_obat" value="{{ $data->nama_obat }}" required>
                </div>

                <div class="field">
                    <label>Stok</label>
                    <input type="number" name="stok"
                           value="{{ $data->stok }}" min="0" required>
                </div>

                <div class="field">
                    <label>Tanggal Kedaluwarsa</label>
                    <input type="date" name="tanggal_kadaluwarsa"
                           value="{{ $data->tanggal_kadaluwarsa }}" required>
                </div>
            @endif

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ url('/apotek') }}">Batal</a>
        </form>
    </div>
</body>
</html>