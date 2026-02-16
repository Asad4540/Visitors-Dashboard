<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <main class="loginPage">
        <div class=" d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="bg-light rounded py-3 px-5 shadow">
                <div class="row justify-content-center align-items-center py-4">
                    <img src="{{ asset('images/VM-Black-Logo.png') }}" alt="VM Logo" class="vm-logo"
                        style="width: 250px;">
                </div>
                <div class="row justify-content-center align-items-center py-2">
                    <div class="col">
                        <p class="heading">Welcome Back</p>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center py-2">
                    <div class="col">
                        <p class="subheading">Log in to access your dashboard and manage your data securely.</p>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center py-2 g-3">
                    <form action="" method="post">
                        <div class="col-12 py-2">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="© Email Address" required>
                        </div>
                        <div class="col-12 py-2">
                            <input type="text" class="form-control" name="password" id="password"
                                placeholder="🔒︎ Password" required>
                        </div>
                        <div class="col-12 py-2">
                            <input type="checkbox" name="rememberMe" id="rememberMe">
                            <span class="checkbox-text">Remember Me</span>
                        </div>
                        <div class="col-12 py-2">
                            <button class="loginBtn"><span>Login</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>