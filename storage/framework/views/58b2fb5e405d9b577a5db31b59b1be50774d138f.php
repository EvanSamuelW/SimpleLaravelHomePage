<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Login page</title>
    <style>
        .myForm {
            min-width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media (max-width: 500px) {
            .myForm {
                min-width: 90%;
            }
        }
    </style>

</head>

<body>

    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <?php if(\Session::has('message')): ?>
                        <div class="alert alert-info">
                            <?php echo e(\Session::get('message')); ?>

                        </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('postlogin')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email"
                                        autofocus>
                                    <?php if($errors->has('email')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password">
                                    <?php if($errors->has('password')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <a class="btn btn-outline-primary" href="<?php echo e(route('register-user')); ?>">Register
                                        Now</a>

                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Signin</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html><?php /**PATH C:\Users\Evan Samuel W\Desktop\VascommTest\vascommTest\resources\views/login.blade.php ENDPATH**/ ?>