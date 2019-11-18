<?php $__env->startSection('content'); ?>
<div class="container">
<p>
<h1 class="text-center my-2">All Category</h1>
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card card-defult">

<?php if(auth()->user()->isAdmin() || auth()->user()->isTeacher() ): ?>
	<div> <a class="btn btn-primary" href="<?php echo e(route('categories.create')); ?>">Add category</a></div>
<?php endif; ?>

<table class="table">
      <thead>
        <th>Name</th>
        <th>Course</th>
         <th>Posts Count</th>
        <th></th>
      </thead>
       
      <tbody> 
        <?php $__currentLoopData = $courseApprovals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $courseApproval): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(Auth::id()===$courseApproval->user_id ): ?>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($category->course_id === $courseApproval->course_id): ?>
          <tr>

              <td>
                  <a href="<?php echo e(route('categories.show', $category->id)); ?>" > <?php echo e($category->name); ?></a>
                </td>
              <td>
                  <?php echo e($category->course->name); ?>

                </td>
            <td>
              <?php echo e($category->post->count()); ?>

            </td>
            <?php if(auth()->user()->isAdmin() || Auth::id() === $category->user_id ): ?>
          <td> 
              <a href="<?php echo e(route('categories.edit', $category->id)); ?>" class="btn btn-info btn-sm">
                Edit
             </a>
          </td>
          <td>
             <form method="POST" action="<?php echo e(route('categories.destroy', $category->id)); ?>">
                 <?php echo e(csrf_field()); ?>

                  <?php echo e(method_field('DELETE')); ?>

                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
          <?php endif; ?>
          </tr>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
</ul>
</p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>