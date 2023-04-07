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
  <title>Customer page</title>

</head>

<body>
  <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php if(\Session::has('message')): ?>
  <div class="alert alert-info">
    <?php echo e(\Session::get('message')); ?>

  </div>
  <?php endif; ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <th scope="row"><?php echo e($loop->index+1); ?></th>
        <td><?php echo e($item->name); ?></td>
        <td><?php echo e($item->user->email); ?></td>
        <td><?php echo e($item->status); ?></td>

        <td>
          <div>
            <a class="btn btn-outline-primary" href="<?php echo e(route('detail',$item->user->id)); ?>">Detail</a>
            <?php if($item->status == 'INACTIVE'): ?>
            <a class="btn btn-outline-primary" href="<?php echo e(route('approve',$item->id)); ?>">Approve</a>
            <?php endif; ?>

          </div>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
</body>

</html><?php /**PATH C:\Users\Evan Samuel W\Desktop\VascommTest\vascommTest\resources\views/customerpage.blade.php ENDPATH**/ ?>