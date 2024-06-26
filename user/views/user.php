<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        .column-profile{
            max-width: 400px;
        }

    </style>
</head>
<body>
    <h1>Profile</h1>
    <div class="column-profile">
    <form id="profileForm">
        <input type="text" id="nameInput" placeholder="Nama Anda" require>
        <button id='submit'>Submit</button>
    </form>
    <div id="result"></div>
    </div>
    <script>
        document.getElementById('submit').addEventListener('profileForm', function(event) {
            event.preventDefault();
           let nama = document.getElementById('profileForm').value;
        });
        document.getElementById('result').textContent = `Halo ${nama}`;
    </script>
</body>
</html>