<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e($pageTitle); ?></h1>
            </div>

            <div class="row">
                <div class="col-12 my-3">
                    <button class="btn btn-success addSlider"><i class="fa fa-plus"></i> Add New Slider</button>
                </div>
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>Image</th>
                                <th>Message</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><img style="width: 80px" src="<?php echo e(getFile('admins', $slider->image)); ?>" alt=""></td>
                                        <td><?php echo e($slider->title); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('admin.slider.delete',$slider->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="button" data-title="<?php echo e($slider->title); ?>" data-href="<?php echo e(route('admin.slider.update',$slider->id)); ?>" class="btn btn-warning editSlider">Edit</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </section>
    </div>


    
    <div class="modal fade" id="sliderModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form action="" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="image-upload" class="form-label">Title</label>
                            <input type="file" class="form-control" name="image" id="image-upload">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        'use strict'

        $(function() {
            $(".addSlider").click(function(e) {
                e.preventDefault();
                var modal = $("#sliderModal");
                modal.find('form').attr('action', "<?php echo e(route('admin.slider.store')); ?>");
                modal.modal('show');
            });
            $(".editSlider").click(function(e) {
                e.preventDefault();
                var modal = $("#sliderModal");
                modal.find('input[name=title]').val($(this).data('title'));
                modal.find('form').attr('action',$(this).data('href'));
                modal.modal('show');
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/user_slider.blade.php ENDPATH**/ ?>