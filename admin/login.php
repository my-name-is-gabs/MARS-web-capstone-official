<?php 
  session_start();
  if(isset($_POST['submit'])) {
    
    $password = $_POST['password'];
    if($password === 'Group7DICT3_6') {
      $_SESSION['login'] = 'Group 7';
      header('Location: index.php');
    }
    else {
      header('Location: login.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - MARS Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script
      src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="bg-primary">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                  </div>
                  <div class="card-body">
                    <form action="login.php" method="post">
                      <div class="form-floating mb-3">
                        <input
                          class="form-control"
                          id="inputPassword"
                          type="password"
                          name="password"
                          placeholder="Password"
                        />
                        <label for="inputPassword">Password</label>
                      </div>

                      

                      <div
                        class="d-flex align-items-center justify-content-between mt-4 mb-0"
                      >
                        <input
                          type="submit"
                          class="btn btn-primary text-end"
                          value="Login"
                          name="submit"
                        />
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">Copyright &copy; MARS Web App 2022</div>
              <a href="../index.html">Return</a>

            </div>
          </div>
        </footer>
      </div>
    </div>
    <script>
      window.history.forward(0);
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
   
  </body>
</html>
