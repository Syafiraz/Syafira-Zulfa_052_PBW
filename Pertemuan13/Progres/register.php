<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Daftar Akun Baru</h2>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
    <?php endif; ?>

    <form method="post" action="proses_regist.php">
        <div class="mb-3">
            <label for="username" class="form-label">Nama Pengguna:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="konfirmasi_password" class="form-label">Konfirmasi Kata Sandi:</label>
            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" required>
        </div>

        <button type="submit" class="btn btn-success">Daftar</button>
    </form>

    <p class="mt-3">Sudah punya akun? <a href="login.php">Login di sini</a></p>
</body>
</html>
