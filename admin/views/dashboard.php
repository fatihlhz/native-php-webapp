<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <p>You are logged in as <?php echo $_SESSION['user']; ?></p>
    <a href="<?php echo htmlspecialchars($GLOBALS['base_url'] . "/logout")?>">Logout</a>
</body>
</html>