{include 'templates/head.tpl'}
    <body class="text-center">
        <main class="form-signin">
            <form method="post" action="authUser">    
                <h1 class="h3 mb-3 fw-normal">Log in</h1>
                <div class="form-floating">
                    <input type="text" name="user" class="form-control" id="floatingInput" placeholder="Username">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="w-30 btn  btn-primary" type="submit">Login</button>
                <a class="w-30 btn  btn-secondary" href="registerUser" role="button">Register</a>
                <p class="mt-2 mb-3 text-muted">&copy; 2024</p>
            </form>
        </main>
    </body>
</html>