<!DOCTYPE html>
<html>
<head>
    <title>Admin Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($base_url . "/public/css/style.css")?>">
    <link rel="stylesheet" href="<?php echo htmlspecialchars($base_url . "/public/css/datatables-style.css")?>">
</head>
<body>
    <main>
        <div class="d-flex">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark full-height" style="width: 280px;">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img class="bi me-2" src="<?php echo htmlspecialchars($base_url . '/public/img/icon/admin_white.svg') ?>"  width="46" height="38">
                    <span class="fs-4">Admin side</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="dashboard" class="nav-link text-white">
                            <img class="bi me-2" src="<?php echo htmlspecialchars($base_url . '/public/img/icon/dashboard.svg') ?>" width="24" height="24">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="buku" class="nav-link text-white">
                            <img class="bi me-2" src="<?php echo htmlspecialchars($base_url . '/public/img/icon/books-white.svg') ?>" width="24" height="24">
                            Buku
                        </a>
                    </li>
                    <li>
                        <a href="kategori" class="nav-link text-white">
                            <img class="bi me-2" src="<?php echo htmlspecialchars($base_url . '/public/img/icon/category-white.svg') ?>" width="24" height="24">
                            Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <img class="bi me-2" src="<?php echo htmlspecialchars($base_url . '/public/img/icon/user-white.svg') ?>" width="24" height="24">
                            User
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong><?php echo $_SESSION['user']; ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?php echo htmlspecialchars($base_url . "/logout")?>">Sign out</a></li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid p-3 second">
                <div class="container-fluid">
                    <h2>User</h2>
                    <hr>
                    <div class="card container-fluid">
                        <div class="card-body">
                            <table class="table datatable mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th>Buku Dipinjam</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php 
                                    foreach ($users as $user) {
                                        echo "<tr>
                                                <td>$user[id]</td>
                                                <td>$user[email]</td>
                                                <td>$user[borrowed]</td>
                                                <td>
                                                    <button type='button' id='edit' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#editModal' data-id='$user[id]' data-title='$user[email]'>Edit</button>
                                                    <button type='button' id='delete' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#deleteModal' data-id='$user[id]' data-title='$user[email]'>Delete</button>
                                                </td>
                                            </tr>";
                                    }
                                   ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <form class="modal-dialog" action="user/tambah" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Add Data</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Email</label>
                            <input type="email" class="form-control" id="title" name="email" placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <form class="modal-dialog" action="user/edit" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Edit Data</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="idEdit" name="id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Email</label>
                            <input type="email" class="form-control" id="titleEdit" name="email" placeholder="Masukkan email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update changes</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <form class="modal-dialog" action="user/delete" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">Delete Data</h5>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="idDelete" name="id">
                        Apakah anda yakin akan menghapus 
                        <span id="titleDelete"></span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="<?php echo htmlspecialchars($base_url . "/public/js/simple-datatables.js")?>"></script>
    <script src="<?php echo htmlspecialchars($base_url . "/public/js/script.js")?>"></script>
</body>
</html>