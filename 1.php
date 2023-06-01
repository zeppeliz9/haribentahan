<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Toggle Password Visibility</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container">
        <h1>Sign In</h1>
        <form method="post">
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="passstittword" id="xpassword" />
                <i class="bi bi-eye-slash" id="togglePassword"></i>
            </p>

            <p>
                <label for="checkpassword">Check Password:</label>
                <input type="password" name="checkpassword" id="checkpassword" />
                <i class="bi bi-eye-slash" id="togglecheckPassword"></i>
            </p>

            <button type="submit" id="submit" class="submit">Log In</button>
        </form>
    </div>
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const password = document.querySelector("#xpassword");
        const togglecheckPassword = document.querySelector("#togglecheckPassword");
        const checkpassword = document.querySelector("#checkpassword");

        togglePassword.addEventListener("click", function () {
            // toggle the type attribute
            const type = password.getAttribute("type") === "password" ? "text" : "xpassword";
            password.setAttribute("type", type);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

        togglecheckPassword.addEventListener("click", function () {
            // toggle the type attribute
            const checktype = checkpassword.getAttribute("type") === "password" ? "text" : "password";
            checkpassword.setAttribute("type", checktype);
            
            // toggle the icon
            this.classList.toggle("bi-eye");
        });

    </script>
</body>

</html>