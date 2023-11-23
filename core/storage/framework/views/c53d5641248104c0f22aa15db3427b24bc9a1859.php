<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="" method="post">

                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    


                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header p-3 my-1 h4 font-weight-bold">
                                                <?php echo e(__('Green Template')); ?>

                                            </div>
                                            <div class="card-body m-0 p-0">
                                                <img class="w-100" src="<?php echo e(asset('asset/theme2.png')); ?>"
                                                    alt="theme-image">
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" <?php echo e(@$general->theme == 2 ? 'disabled' : ''); ?>

                                                    class="btn btn-primary btn-block mt-3 active-btn"
                                                    data-route="<?php echo e(route('admin.manage.theme.update', 2)); ?>">
                                                    <?php if($general->theme == 2): ?>
                                                        <span><i class="fas fa-save pr-2"></i>
                                                            <?php echo e(__('Active')); ?></span>
                                                    <?php else: ?>

                                                    <span><i class="fas fa-save pr-2"></i>
                                                        <?php echo e(__('Select As Active')); ?></span>
                                                    <?php endif; ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    

                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="activeTheme" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo e(__('Active Template')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <?php echo e(__('Are you sure to active this template ?')); ?>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Active')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('.active-btn').on('click', function() {
                const modal = $('#activeTheme');

                modal.find('form').attr('action', $(this).data('route'))

                modal.modal('show')
            })
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/setting/theme.blade.php ENDPATH**/ ?>