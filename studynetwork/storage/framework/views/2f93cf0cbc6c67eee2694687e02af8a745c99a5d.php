<?php $__env->startSection('content'); ?>
<div class="card card-default">
  <div class="card-header">Users</div>

  <div class="card-body">
    <?php if($users->count() > 0): ?>
      <table class="table">
        <thead>
          <th>Name</th>
          <th>Email</th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              
              <td>
                <?php echo e($user->name); ?>

              </td>
              <td>
                <?php echo e($user->email); ?>

              </td>
              <td>
                <?php if(!$user->isAdmin()): ?>
                  <form action="<?php echo e(route('users.make-admin', $user->id)); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-success btn-sm">Make Admin</button>
                  </form>
                <?php endif; ?>
              </td>
              <td>
                <?php if(!$user->isTeacher()): ?>
                  <form action="<?php echo e(route('users.make-teacher', $user->id)); ?>" method="POST">
                     <?php echo e(csrf_field()); ?>

                    <button type="submit" class="btn btn-success btn-sm">Make Teacher</button>
                  </form>
                <?php endif; ?>
              </td>

            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    <?php else: ?>
      <h3 class="text-center">No Users Yet</h3>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>