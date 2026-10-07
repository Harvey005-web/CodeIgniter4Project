<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root { --primary-color: #1e40af; --secondary-color: #f59e0b; --dark-color: #1f2937; }

        body {
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8fafc;
        }

        .login-navbar { background: #fff; }
        .brand { color: var(--primary-color); font-size: 1.35rem; font-weight: 700; text-decoration: none; }
        .brand i { color: var(--secondary-color); }
        .back-home { color: var(--primary-color); font-weight: 600; text-decoration: none; }
        .back-home:hover { color: #d97706; }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--dark-color) 100%);
        }

        .login-card {
            width: 100%;
            border: 0;
            border-radius: 1rem;
            box-shadow: 0 1rem 2.5rem rgba(0, 0, 0, .25);
            overflow: hidden;
        }

        .login-icon { color: var(--secondary-color); font-size: 2.5rem; }
        .login-heading { color: var(--primary-color); font-weight: 700; }
        .login-subtitle { color: #6b7280; }
        .form-control { border-radius: .6rem; padding: .7rem .85rem; }
        .form-control:focus { border-color: var(--primary-color); box-shadow: 0 0 0 .2rem rgba(30, 64, 175, .18); }
        .login-button { background: var(--secondary-color); border-color: var(--secondary-color); border-radius: 25px; padding: .7rem; font-weight: 600; }
        .login-button:hover { background: #d97706; border-color: #d97706; transform: translateY(-1px); }
    </style>
</head>
<body>
    <nav class="login-navbar navbar shadow-sm">
        <div class="container">
            <a class="brand" href="<?= base_url() ?>"><i class="fas fa-bolt me-2"></i>Puihaha Electric</a>
            <a class="back-home" href="<?= base_url() ?>"><i class="fas fa-arrow-left me-2"></i>Back to Home</a>
        </div>
    </nav>
    <main class="login-page py-5">
        <div class="container" style="max-width: 440px;">
            <div class="card login-card">
                <div class="card-body p-4 p-md-5">
                    <div class="text-center mb-4">
                        <i class="fas fa-bolt login-icon mb-3"></i>
                        <h1 class="h3 login-heading mb-2">Welcome back</h1>
                        <p class="login-subtitle mb-0">Sign in to manage your electric services.</p>
                    </div>
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('login') ?>">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" value="<?= esc(old('email')) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" required>
                    </div>
                    <button class="btn btn-primary login-button w-100" type="submit">Login</button>
                </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
