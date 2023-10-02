<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Register</h2>
                <form action="register.php" method="POST" onsubmit="return validatePassword()">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <small id="passwordHelp" class="form-text text-muted">*Password hanya bisa berupa huruf kecil (a-z)</small>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-success">Register</button>
                    <a href="login-site.php" class="btn btn-primary">Login</a>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for password validation -->
    <script>
        function validatePassword() {
            var passwordInput = document.getElementById("password");
            var passwordValue = passwordInput.value;
            var letters = /^[A-Za-z]+$/;

            if (!passwordValue.match(letters)) {
                alert("Password hanya bisa berupa huruf kecil (a-z) ");
                passwordInput.focus();
                return false;
            }

            return true;
        }
    </script>

    <!-- CSS Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>