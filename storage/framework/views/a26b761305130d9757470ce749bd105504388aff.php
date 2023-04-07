<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Vascomm Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if($isAdmin): ?>
        <li class="nav-item">
          <span class="nav-link" aria-current="page" href="#">Administrator</span>
        </li>
        <?php endif; ?>
      </ul>
      <div class="d-flex">
        <?php if(!$isLogin): ?>
        <a class="btn btn-outline-primary" href="<?php echo e(route('login')); ?>">Login</a>
        <?php endif; ?>
        <?php if($isLogin): ?>
        <span class="nav-link" href="#">Welcome <?php echo e(Auth::user()->name); ?></span>
        <a class="btn btn-outline-primary" href="<?php echo e(route('signout')); ?>">Logout</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav><?php /**PATH C:\Users\Evan Samuel W\Desktop\VascommTest\vascommTest\resources\views/components/navbar.blade.php ENDPATH**/ ?>