<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6c757d, #343a40);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-logo a {
            font-size: 2rem;
            font-weight: bold;
            color: #94c1f1;
        }

        .login-logo a:hover {
            text-decoration: none;
        }

        .btn-primary {
            background: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <div class="login-logo text-center mb-4">
            <a href='#'><b>Trang Quản Trị</b></a>
        </div>
        <div class="card login-card p-4">
            <div class="card-body">
                <p class="login-box-msg text-center mb-4">Form Đăng Nhập</p>
                <form action="{{ route('login.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
