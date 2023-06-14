<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            margin-bottom: 1em;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f2f2f2;
            padding: 2em;
            border-radius: 5px;
        }

        label {
            font-size: 1.2rem;
            margin-bottom: 0.5em;
        }

        input {
            padding: 0.5em;
            border-radius: 3px;
            border: 1px solid #ccc;
            margin-bottom: 1em;
            width: 100%;
            max-width: 300px;
        }

        button[type="submit"] {
            padding: 0.5em 1em;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffff;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form id="login-form" action="#">
            <label for="emai">Email</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>

        <script>
            const loginForm = document.getElementById('login-form');
            loginForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                const response = await fetch('/api/login/authenticate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'aplication/json'
                    },
                    body: JSON.stringify({
                        email,
                        password
                    })
                });
                
                const jsonData = await response.json();
                console.log(jsonData);
                if (jsonData.success) {
                    window.location.href = '/dashboard'
                } else {
                    alert(jsonData.message)
                }
            });
        </script>
    </div>
</body>

</html>