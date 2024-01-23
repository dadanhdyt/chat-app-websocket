<?php session_start();
if(isset($_SESSION['user'])){
    header('location:inbox.php');die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
        }

        .login-container h2 {
            margin: 0;
            padding: 20px 0;
            background-color: #4CAF50;
            color: #fff;
        }

        .login-form {
            padding: 20px;
            box-sizing: border-box;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="form_login" class="login-form">
            <input name="username" type="text" placeholder="Username" required>
            <input name="password" type="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
    <script>
        document.getElementById('form_login').addEventListener('submit', async (e) => {
            e.preventDefault();

            const data = new FormData(e.target);

            const response = await fetch('ajax/login.php', {
                method: "POST",
                body: data
            });
            const responseStatus = await response.text();
            if (responseStatus === 'OK') {
                window.location.href = "inbox.php";
            } else {
                alert("Login Gagal");
            }



        })
    </script>
</body>

</html>
