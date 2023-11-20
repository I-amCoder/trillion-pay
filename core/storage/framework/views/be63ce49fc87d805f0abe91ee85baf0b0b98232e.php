


<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo e(__($pageTitle)); ?></h1>
          </div>

    <div class="row">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
               
                <div class="card-body text-center">
                    <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between">

                        <span><?php echo e(__('Transaction Id')); ?></span>
                        <span><?php echo e($manual->transaction_id); ?></span>
                    
                    </li> 
                    
                    <li class="list-group-item d-flex justify-content-between">

                        <span><?php echo e(__('Payment Date')); ?></span>
                        <span><?php echo e($manual->created_at->format('d F Y')); ?></span>
                    
                    </li>
                    <?php $__currentLoopData = $manual->payment_proof; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $proof): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if(is_array($proof)): ?>

                        <li class="list-group-item d-flex justify-content-between">

                            <span><?php echo e(__(str_replace('_',' ', ucwords($key)))); ?></span>
                            <span class="text-right"><img src="<?php echo e(getFile('manual_payment', $proof['file'])); ?>" alt="" class="w-50 "></span>
                        
                        </li>

                        <?php continue; ?>

                    <?php endif; ?>
                  
                        <li class="list-group-item d-flex justify-content-between">

                            <span><?php echo e(__(str_replace('_',' ', ucwords($key)))); ?></span>
                            <span><?php echo e(__($proof)); ?></span>
                        
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </ul>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/manual_payments/details.blade.php ENDPATH**/ ?>