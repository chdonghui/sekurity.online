<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>웹 해킹 실습</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./css/pricing.css" rel="stylesheet">

    <style>
		/* Add padding to the .card class */
		.card {
			padding: 20px;
		}
    </style>
    </head>
    <body>
        <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-fill-check" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647z"/>
            </svg>&nbsp;&nbsp;
            <h5 class="my-0 mr-md-auto font-weight-normal">seKUrity</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="index.php">Home</a>
                <a class="p-2 text-dark" href="about.php">About</a>
                <a class="p-2 text-dark" href="board.php">Board</a>
                <a class="p-2 text-dark" href="members.php">Members</a>
            </nav>
            <a class="btn <?php if(isset($_COOKIE["user_id"])) { echo "btn-outline-danger"; } else { echo "btn-outline-success"; } ?>" href="<?php if(isset($_COOKIE["user_id"])) { echo "cookie_logout.php"; } else { echo "login.php"; } ?>">
                <?php if(isset($_COOKIE["user_id"])) { echo "Logout"; } else { echo "Login"; } ?>
            </a>
            <!--signup.php-->
        </header>

        <?php if(!isset($_COOKIE["user_id"])) {?>
        <div class="container">
            <div class="container text-center mt-5">
                <a class="btn btn-outline-success" href="signup.php">
                    회원가입
                </a>
            </div>
        </div>
        <?php }  else {?>
            <!-- Login Form -->
            <main class="form-signin text-center" style="max-width: 450px; margin: 0 auto;">
                <form method="GET" action="member_delete.php">
                    <br><br>
                    <img class="mb-4" src="img/seKUrity.png" alt="" width="50%" height=auto>
                    <div class="card">
                        <h1 class="h3 mb-3 fw-normal">Please sign Delete</h1>
                        <div class="form-floating">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                </span>
                                <input type="text" name="id" class="form-control" id="floatingInput" placeholder="ID">
                            </div>
                            <label for="floatingInput"></label>
                        </div>
                        <div class="form-floating">
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </span>
                                <input type="password" name="pw" class="form-control" id="floatingPassword" placeholder="PASSWORD">
                            </div>
                            <label for="floatingPassword"></label>
                        </div>
                        <button class="btn btn-primary w-100 py-2" type="submit">회원탈퇴</button>
                    </div>
                    <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p>
                </form>
            </main>
            <!-- End of Login Form -->
        <?php } ?>

        <!-- Icons -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="./js/jquery-slim.min.js"><\/script>')</script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/holder.min.js"></script>
        <script>
            Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
            });
        </script>
    </body>
</html>

