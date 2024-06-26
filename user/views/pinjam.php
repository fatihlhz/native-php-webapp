<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tersedia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-text {
            max-height: 4.5rem; /* Adjust the height as needed */
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>
<body>
    <nav class="d-flex justify-content-between py-3" style="background-color: #FF7F3E">
        <div class="d-flex w-25 justify-content-center align-items-center">
            <img src="<?php echo htmlspecialchars($base_url . '/public/img/logo-web.png') ?>" alt="logo" style="width: 130px">
        </div>
        <div class="d-flex w-50 justify-content-center gap-5 align-items-center ">
            <a href="dashboard" class="text-dark link-underline link-underline-opacity-0 fs-5">Home</a>
            <a href="category" class="text-dark link-underline link-underline-opacity-0 fs-5">Category</a>
            <a href="pinjam" class="text-dark link-underline link-underline-opacity-0 fs-5">Borrowed Books</a>

        </div>
        <div class="d-flex w-25 justify-content-center align-items-center ">
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="border-radius: 20px"> 
        </form>
        <div class="dropdown px-3">
                <a href="#" class="text-dark fs-5" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM8 9a5 5 0 0 0-5 5v1h10v-1a5 5 0 0 0-5-5z"/>
                    </svg>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="user.php">User Page</a></li>
                    <li><a class="dropdown-item" href="login">Login</a></li>
                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
    <h2>Daftar Peminjaman Buku</h2>

    <?php
    // Data array untuk tabel
    $data_peminjaman = [
        ['id' => 1, 'nama' => 'John Doe', 'buku' => 'Book 1', 'tanggal_pinjam' => '2024-06-22', 'tanggal_kembali' => '2024-06-29', 'status' => 'Dipinjam'],
        ['id' => 2, 'nama' => 'Jane Smith', 'buku' => 'Book 3', 'tanggal_pinjam' => '2024-06-23', 'tanggal_kembali' => '2024-06-30', 'status' => 'Diproses'],
        ['id' => 3, 'nama' => 'Mary Johnson', 'buku' => 'Book 2', 'tanggal_pinjam' => '2024-06-24', 'tanggal_kembali' => '2024-07-01', 'status' => 'Diproses'],
        ['id' => 3, 'nama' => 'Ahmed Chiuk', 'buku' => 'Book 4', 'tanggal_pinjam' => '2024-06-24', 'tanggal_kembali' => '2024-07-01', 'status' => 'Dipinjam'],
    ];

    // Fungsi untuk menentukan warna badge berdasarkan status
    function getStatusBadge($status) {
        switch($status) {
            case 'Dipinjam':
                return '<span class="badge bg-success">Dipinjam</span>';
            case 'Diproses':
                return '<span class="badge bg-warning text-dark">Diproses</span>';
            // case 'Belum Dipinjam':
            //     return '<span class="badge bg-secondary">Belum Dipinjam</span>';
            default:
                return '<span class="badge bg-dark">Tidak Diketahui</span>';
        }
    }
    ?>

    <table class="table table-striped my-3">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Buku Dipinjam</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data_peminjaman as $data): ?>
                <tr>
                    <th scope="row"><?php echo $data['id']; ?></th>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['buku']; ?></td>
                    <td><?php echo $data['tanggal_pinjam']; ?></td>
                    <td><?php echo $data['tanggal_kembali']; ?></td>
                    <td><?php echo getStatusBadge($data['status']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
