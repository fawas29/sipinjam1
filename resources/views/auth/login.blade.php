<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - SiPinjam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Memanggil Bootstrap Icons untuk icon di dalam input -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card-auth { max-width: 400px; margin: auto; border: none; border-radius: 10px; }
    </style>
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary vh-100">

    <main class="w-100 m-auto">
        <div class="card card-auth shadow-sm p-4">
            <div class="text-center mb-4">
                <h3 class="fw-bold">Masuk</h3>
                <p class="text-muted small">Silakan masuk ke akun Anda</p>
            </div>

            <form>
                <div class="mb-3">
                    <label class="form-label small text-muted">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="nama@email.com">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small text-muted">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Masukkan password">
                    </div>
                </div>

                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="ingatSaya">
                    <label class="form-check-label small" for="ingatSaya">Ingat saya</label>
                </div>

                <button class="btn btn-primary w-100 py-2 mb-3" type="button">Masuk</button>
                
                <div class="text-center small">
                    Belum punya akun? <a href="{{ url('/daftar') }}" class="text-decoration-none fw-semibold">Daftar di sini</a>
                </div>
            </form>
        </div>
    </main>

</body>
</html>