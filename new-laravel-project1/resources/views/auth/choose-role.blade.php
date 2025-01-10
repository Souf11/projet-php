<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Role</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .header {
            font-size: 32px;
            font-weight: bold;
            margin: 20px 0 200px; 
            color: #333333;
        }

        .container {
            display: flex;
            width: 800px;
            height: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .left, .right {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .left {
            background-color: #ffffff;
            padding: 20px;
        }

        .right {
            background-color: #111111;
            color: #ffffff;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        button {
            width: 200px;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .left button {
            background-color: #333333;
            color: white;
        }

        .right button {
            background-color: #ffffff;
            color: black;
        }

        button:hover {
            background-color: #555555;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="header">Cahier de texte</div>
    <div class="container">
        <div class="left">
            <h1>Sign In</h1>
            <form action="{{ route('login') }}" method="GET">
                <button name="role" value="professeur" type="submit">Professeur</button>
            </form>
        </div>
        <div class="right">
            <h1>Hello!</h1>
            <form action="{{ route('login.administrateur') }}" method="GET">
    <button name="role" value="administrateur" type="submit">Administrateur</button>
</form>

        </div>
    </div>
</body>
</html>
