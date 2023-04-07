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

    <style>
        .carousel-inner {
            height: 300px;
            min-height: 700px;
        }

        .card-img-top {
            width: 100%;
            height: 15vw;
            object-fit: cover;
        }
    </style>
    <title>Home Page</title>
</head>

<body>

    <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(isset($banners)): ?>
    <?php echo $__env->make('components.carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <h2>Banner is Empty</h2>
    <?php endif; ?>


    <?php if(isset($products)): ?>
    <?php echo $__env->make('components.itemCard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
    <h2>Product is Empty</h2>
    <?php endif; ?>


</body>

</html><?php /**PATH C:\Users\Evan Samuel W\Desktop\VascommTest\vascommTest\resources\views/homepage.blade.php ENDPATH**/ ?>