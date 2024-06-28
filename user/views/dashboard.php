<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                    <li><a class="dropdown-item" href="user">User Page</a></li>
                    <!-- <li><a class="dropdown-item" href="login">Login</a></li -->
                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
    <h2>Dashboard</h2>
    
    <div class="d-flex flex-wrap my-3 justify-content-center px-3 ">
        <?php
        $counter = 0;
        foreach ($books as $book):
            if ($counter % 4 == 0): // Start a new row for every 4 cards
        ?>
        <div class="row w-100 mb-4">
        <?php endif; ?>
        
        <div class="col-md-3 d-flex justify-content-center">
            <div class="card my-2 h-100" style="width: 18rem;">
                <img src="<?php echo htmlspecialchars($base_url . '/public/img/book.jpeg') ?>" class="card-img-top" alt="Book Image" >                    
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($book['category']); ?></h6>
                        <p class="card-text"><?php echo htmlspecialchars($book['book_id']); ?></p>
                        <!-- <p class="card-text"><?php echo htmlspecialchars($_SESSION['user']); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($_SESSION['category']); ?></p> -->
                    </div>
                    <form action="dashboard/pinjam" method="POST">
                        <input type="hidden" name="id_book" value="<?php echo $book['book_id']; ?>">
                        <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">

                        <div>
                            <button type="submit" style="background-color: #FF7F3E; text-decoration: none; color: black;" class="btn">Pinjam Buku</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
            $counter++;
            if ($counter % 4 == 0): // Close the row after 4 cards
        ?>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php if ($counter % 4 != 0): // Close the last row if it has less than 4 cards ?>
        </div>
        <?php endif; ?>
    </div>
</div>
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>