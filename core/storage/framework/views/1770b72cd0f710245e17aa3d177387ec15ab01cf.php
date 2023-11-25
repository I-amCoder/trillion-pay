

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <?php
                $counter = 0;
            ?>

            <?php if(isset($section['content'])): ?>
                <div class="card">
                    <form method="post" action="" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">

                                <?php $__currentLoopData = $section['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sec == 'text'): ?>
                                        <div class="form-group col-md-6">

                                            <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                            <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                value="<?php echo e($content !== null ? @$content->data->$key : ''); ?>"
                                                class="form-control" required>

                                        </div>
                                    <?php elseif($sec == 'file'): ?>
                                        <div class="form-group col-md-5 mb-3">
                                            <label class="col-form-label"><?php echo e(__(frontendFormatter($key))); ?></label>

                                            <div id="image-preview" class="image-preview"
                                                style="background-image:url(<?php echo e(getFile(request()->name, @$content->data->$key)); ?>);">
                                                <label for="image-upload" id="image-label"><?php echo e(__('Choose File')); ?></label>
                                                <input type="<?php echo e($sec); ?>" name="<?php echo e($key); ?>"
                                                    id="image-upload" />
                                            </div>

                                        </div>
                                    <?php elseif($sec == 'textarea'): ?>
                                        <div class="form-group col-md-12">

                                            <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                            <textarea name="<?php echo e($key); ?>" class="form-control"><?php echo e($content !== null ? clean(@$content->data->$key) : ''); ?></textarea>

                                        </div>
                                    <?php elseif($sec == 'textarea_nic'): ?>
                                        <div class="form-group col-md-12">

                                            <label for=""><?php echo e(__(frontendFormatter($key))); ?></label>
                                            <textarea name="<?php echo e($key); ?>" class="form-control summernote"><?php echo e($content !== null ? clean(@$content->data->$key) : ''); ?></textarea>

                                        </div>
                                    <?php elseif($sec == 'icon'): ?>
                                        <div class="form-group col-md-6">
                                            <div class="input-group">
                                                <label for=""
                                                    class="w-100"><?php echo e(__(frontendFormatter($key))); ?></label>
                                                <input type="text" class="form-control icon-value"
                                                    name="<?php echo e($key); ?>" value="<?php echo e(@$content->data->$key); ?>">
                                                <span class="input-group-append">
                                                    <button class="btn btn-outline-secondary iconpicker"
                                                        data-icon="fas fa-home" role="iconpicker"></button>
                                                </span>
                                            </div>
                                        </div>
                                    <?php elseif($key == 'multiple_image'): ?>
                                        <?php $__currentLoopData = $section['content'][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $filetype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="form-group col-md-5 mb-3">
                                                <label class="col-form-label"><?php echo e(__(frontendFormatter($name))); ?></label>

                                                <div id="image-preview-<?php echo e($loop->iteration); ?>" class="image-preview"
                                                    style="background-image:url(<?php echo e(getFile(request()->name, @$content->data->$name)); ?>);">
                                                    <label for="image-upload-<?php echo e($loop->iteration); ?>"
                                                        id="image-label-<?php echo e($loop->iteration); ?>"><?php echo e(__('Choose File')); ?></label>
                                                    <input type="<?php echo e($filetype); ?>" name="<?php echo e($name); ?>"
                                                        id="image-upload-<?php echo e($loop->iteration); ?>" />
                                                </div>

                                            </div>

                                            <?php
                                                $counter = count($section['content'][$key]);
                                            ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="form-group col-md-12">

                                    <button type="submit" class="btn btn-primary float-right"><?php echo e(__('Update')); ?></button>

                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            <?php endif; ?>

            <?php if(isset($section['element'])): ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> <a href="<?php echo e(route('admin.frontend.element', request()->name)); ?>"
                                        class="btn btn-icon icon-left btn-primary add-page"> <i class="fa fa-plus"></i>
                                        <?php echo e(__('Add ' . request()->name)); ?></a></h4>
                                <div class="card-header-form">
                                    <form method="GET"
                                        action="<?php echo e(route('admin.frontend.element.search', request()->name)); ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th><?php echo e(__('Sl')); ?>.</th>
                                                <?php
                                                    $keys = [];
                                                ?>

                                                <?php $__currentLoopData = $section['element']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if(request()->name != 'brand'): ?>
                                                        <?php if($sec == 'textarea' ||
                                                            $sec == 'file' ||
                                                            $sec == 'textarea_nic' ||
                                                            $sec == 'icon' ||
                                                            $key == 'size' ||
                                                            $sec == 'on' ||
                                                            $key == 'unique'): ?>
                                                            <?php continue; ?>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <?php if($key == 'size'): ?>
                                                            <?php continue; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                    <th><?php echo e(__(frontendFormatter($key))); ?></th>
                                                    <?php
                                                        array_push($keys, $key);
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <th><?php echo e(__('Action')); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr class="text-center">
                                                    <td><?php echo e($loop->iteration); ?></td>
                                                    <?php $__currentLoopData = $keys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key == 'size' || $key == 'unique'): ?>
                                                            <?php continue; ?>
                                                        <?php endif; ?>
                                                        <?php if(request()->name != 'brand'): ?>
                                                            <td><?php echo e(@$element->data->$key); ?></td>
                                                        <?php else: ?>
                                                            <td><img src="<?php echo e(getFile(request()->name, $element->data->$key)); ?>"
                                                                    alt="" class="image-rounded p-2"></td>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <td>
                                                        <a href="<?php echo e(route('admin.frontend.element.edit', ['name' => request()->name, 'element' => $element])); ?>"
                                                            class="btn btn-md py-1 btn-primary"><i
                                                                class="fa fa-pen"></i></a>
                                                        <button class="btn btn-md py-1 btn-danger delete"
                                                            data-url="<?php echo e(route('admin.frontend.element.delete', [request()->name, $element])); ?>"><i
                                                                class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td class="text-center" colspan="100%"><?php echo e(__('No Data Found')); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </section>

    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Delete Element')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <?php echo csrf_field(); ?>

                        <p><?php echo e(__('Are You Sure To Delete Element')); ?>?</p>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-3"
                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn btn-danger"><?php echo e(__('Delete Page')); ?></button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'


            for (let index = 1; index <= <?php echo e($counter); ?>; index++) {
                $.uploadPreview({
                    input_field: "#image-upload-" + index,
                    preview_box: "#image-preview-" + index,
                    label_field: "#image-label-" + index,
                    label_default: "<?php echo e(__('Choose File')); ?>",
                    label_selected: "<?php echo e(__('Upload File')); ?>",
                    no_label: false,
                    success_callback: null
                });

            }

            $('.summernote').summernote();

            $('.delete').on('click', function() {
                const modal = $('#deleteModal');

                modal.find('form').attr('action', $(this).data('url'))
                modal.modal('show')
            })


            $('.iconpicker').on('change', function(e) {
                $('.icon-value').val(e.icon)
            })


            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "<?php echo e(__('Choose File')); ?>",
                label_selected: "<?php echo e(__('Upload File')); ?>",
                no_label: false,
                success_callback: null
            });


        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/backend/frontend/index.blade.php ENDPATH**/ ?>