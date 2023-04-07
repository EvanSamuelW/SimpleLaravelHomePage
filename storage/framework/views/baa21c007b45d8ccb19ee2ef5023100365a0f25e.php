<section class="bg-light pt-5 pb-5 shadow-sm">
  <div class="container">
    <div class="row pt-5">
      <div class="col-12">
        <h3 class="text-uppercase border-bottom mb-4">Browse our product</h3>
      </div>
    </div>
    <div class="row">
      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-4 mb-3 d-flex align-items-stretch">
        <div class="card">
          <img src="<?php echo e(url('/product/'.$item->image)); ?>" class="card-img-top" alt="Card Image">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?php echo e($item->name); ?></h5>
            <p class="card-text mb-4">Rp. <?php echo e($item->price); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</section><?php /**PATH C:\Users\Evan Samuel W\Desktop\VascommTest\vascommTest\resources\views/components/itemCard.blade.php ENDPATH**/ ?>