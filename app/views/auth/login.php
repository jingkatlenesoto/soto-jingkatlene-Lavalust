<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM LOGIN</title>

    <!-- Font Awesome for Input & Profile Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f7e7ce;
            background-image: radial-gradient(#ebd8ba 15%, transparent 16%), radial-gradient(#ebd8ba 15%, transparent 16%);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            width: 380px;
            background: #f7ddb9;
            border: 3px solid #7c412b;
            border-radius: 30px;
            padding: 40px 30px 30px 30px;
            position: relative;
            box-shadow: 0 10px 20px rgba(124, 65, 43, 0.15);
        }

        /* Top Square Avatar Badge */
        .avatar-container {
            width: 80px;
            height: 80px;
            background: #f7ddb9;
            border: 3px solid #7c412b;
            border-radius: 12px;
            position: absolute;
            top: -42px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .avatar-container i {
            color: #7c412b;
            font-size: 52px;
        }

        /* Title */
        h1 {
            text-align: center;
            color: #7c412b;
            font-size: 32px;
            font-weight: normal;
            margin: 15px 0 25px 0;
        }

        .login-body {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-wrapper {
            display: flex;
            align-items: center;
            background: #fdf3e7;
            border: 2px solid #7c412b;
            border-radius: 12px;
            padding: 4px 12px;
        }

        .input-icon {
            color: #7c412b;
            font-size: 18px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-wrapper input {
            border: none;
            background: transparent;
            padding: 10px 5px;
            width: 100%;
            outline: none;
            font-size: 16px;
            color: #5c2f1e;
        }

        .input-wrapper input::placeholder {
            color: #7c412b;
            opacity: 0.8;
        }

        /* Toggle Password Icon */
        .toggle-password {
            cursor: pointer;
            color: #7c412b;
            font-size: 16px;
            padding: 0 5px;
        }

        /* Submit Button */
        .btn-submit {
            width: 100%;
            padding: 12px;
            border: 2px solid #7c412b;
            border-radius: 25px;
            background: #f3be8a;
            color: #7c412b;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
            cursor: pointer;
            margin-top: 10px;
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            background: #e7aa72;
        }

        /* Options Row */
        .options-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            color: #7c412b;
            margin-top: 20px;
            font-weight: 500;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .remember-me input {
            cursor: pointer;
            accent-color: #7c412b;
        }

        .forgot-link {
            color: #7c412b;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        /* Error Box */
        .error {
            padding: 10px;
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <!-- Top Square Avatar Icon -->
        <div class="avatar-container">
            <i class="fa-solid fa-user"></i>
        </div>

        <div class="login-body">
            <h1>Sign In</h1>

            <?php if (!empty($error)): ?>
                <div class="error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="<?= site_url('login') ?>">
                <!-- Username Field -->
                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>

                <!-- Password Field -->
                <div class="input-group">
                    <div class="input-wrapper">
                        <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="••••••••••••" required>
                        <span class="toggle-password"><i class="fa-solid fa-eye-slash"></i></span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-submit">LOGIN</button>

                <!-- Options Row -->
                <div class="options-row">
                    <label class="remember-me">
                        <input type="checkbox" name="remember_me">
                        Remember me
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>