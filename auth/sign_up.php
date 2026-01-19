<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>apex-mercato</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <!-- ================= SIGN UP ================= -->
    <div class="auth-container" id="signup">
        <div class="auth-box">
            <h2>Sign Up</h2>

            <label>Full Name</label>
            <input type="text" placeholder="Your name">

            <label>Email</label>
            <input type="email" placeholder="Your email">

            <label>Password</label>
            <input type="password">

            <label>Role</label>
            <select>
                <option value="admin">Administrator</option>
                <option value="journalist">Journalist</option>
                <option value="visitor">Visitor</option>
            </select>

            <button>Create Account</button>

            <p class="switch">
                Already have an account? <a href="login.php">Login</a>
            </p>
        </div>
    </div>
</body>

</html>