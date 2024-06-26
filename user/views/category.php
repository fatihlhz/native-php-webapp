<?php
// Assuming you have already established a database connection here
// Example categories data (you would fetch this from your database)
$categories = [
    ['id' => 1, 'name' => 'Fiction', 'description' => 'Books that contain fictional stories.'],
    ['id' => 2, 'name' => 'Non-Fiction', 'description' => 'Books that are based on real facts and information.'],
    ['id' => 3, 'name' => 'Science Fiction', 'description' => 'Books that deal with imaginative and futuristic concepts.'],
    ['id' => 4, 'name' => 'Biography', 'description' => 'Books that tell the life stories of people.'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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
        <h2>Categories</h2>
        
        <div class="row">
            <?php foreach ($categories as $category): ?>
            <div class="col-md-3">
                <div class="card my-3 h-100" style="width: 20rem;">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h5 class="card-title"><?php echo htmlspecialchars($category['name']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($category['description']); ?></p>
                        </div>
                        <div>
                            <a href="category_books.php?category_id=<?php echo $category['id']; ?>" style="background-color: #FF7F3E; text-decoration: none; color: black;" class="btn">View Books</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
