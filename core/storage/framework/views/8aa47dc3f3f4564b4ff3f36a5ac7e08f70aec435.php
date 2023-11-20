<?php if($paginator->hasPages()): ?>
    <div class="mt-2">
        <nav class="d-inline-block">

            <ul class="pagination mb-0">
                <?php if($paginator->onFirstPage()): ?>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" tabindex="-1">

                        </a>
                    </li>
                <?php endif; ?>

                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(is_string($element)): ?>
                        <li class="disabled"><span><?php echo e($element); ?></span></li>
                    <?php endif; ?>

                    <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="page-item <?php echo e($key == $paginator->currentPage() ? 'active' : ''); ?>">
                            <a class="page-link" href="<?php echo e($el); ?>"><?php echo e($key); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>">

                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/partial/paginate.blade.php ENDPATH**/ ?>