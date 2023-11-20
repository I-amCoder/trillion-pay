


<?php $__env->startSection('content'); ?>

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header justify-content-end">
                            <a href="<?php echo e(route('admin.time.create')); ?>" class="btn btn-primary" data-toggle="modal" data-target="#time"> <i
                                    class="fa fa-plus"></i>
                                <?php echo e(__('Add Time')); ?></a>
                            
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-2">
                                    <thead>
                                        <tr>

                                            <th><?php echo e(__('SL')); ?>.</th>
                                            <th><?php echo e(__('Name')); ?></th>
                                            <th><?php echo e(__('Time')); ?></th>
                                            <th><?php echo e(__('Action')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($time->name); ?></td>
                                                <td><?php echo e($time->time); ?> <?php echo e(__('Hours')); ?></td>

                                                <td>
                                                    <a href="#" data-collection="<?php echo e($time); ?>" data-href="<?php echo e(route('admin.time.update', $time->id)); ?>"
                                                        class="btn btn-md btn-primary editTime"><i class="fa fa-pen mr-2"></i
                                                            class="fa fa-pen mr-2"></i><?php echo e(__('Edit')); ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                                            <tr>
                                                <td class="text-center" colspan="100%">
                                                    <?php echo e(__('No Time Created Yet')); ?></td>
                                            </tr>

                                        <?php endif; ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>




    <div class="modal fade" id="time" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('ADD NEW TIME')); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.time.store')); ?>"  method="POST" >
                    <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label><?php echo e(__('Time Name: ')); ?></label>
                    <input type="text" class="form-control" value="" name="name" placeholder="<?php echo e(__('Ex: Day, Week, Month...')); ?>" required>
                </div>

                <div class="form-group">
                    <label><?php echo e(__('Time in Hours')); ?></label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="time" value=""   placeholder="<?php echo e(__('Ex: 24h, 4h...')); ?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><?php echo e(__('Hours')); ?></div>
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
            </form>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
          </div>
        </div>
      </div>






      <div class="modal fade" id="edittime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Edit TIME')); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                   
                <div class="form-group">
                    <label><?php echo e(__('Time Name: ')); ?></label>
                    <input type="text" class="form-control" value="" id="name" name="name" placeholder="<?php echo e(__('Ex: Day, Week, Month...')); ?>" required>
                </div>

                <div class="form-group">
                    <label><?php echo e(__('Time in Hours')); ?></label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="time" value=""   placeholder="<?php echo e(__('Ex: 24h, 4h...')); ?>" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text"><?php echo e(__('Hours')); ?></div>
                        </div>
                    </div>
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
            </form>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
          </div>
        </div>
      </div>

      
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>

            <script>
                $(function() {
                    'use strict'

                    $('.editTime').on('click', function() {
                        const modal = $('#edittime')

                        let item=$(this).data('collection');                 

                        modal.find('input[name=name]').val(item.name);

                        modal.find('input[name=time]').val(item.time);       


                        modal.find('form').attr('action', $(this).data('href'))

                        modal.modal('show')
                    })
                })
            </script>

 <?php $__env->stopPush(); ?>


<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/timemanagement/index.blade.php ENDPATH**/ ?>