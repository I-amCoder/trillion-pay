<?php $__env->startSection('content'); ?>



    <?php echo $__env->make('frontend.sections.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if($sections->sections != null): ?>
        <?php $__currentLoopData = $sections->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sections): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('frontend.sections.'.$sections, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


    <div class="modal fade" id="calculationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Profit calculate')); ?></h5>
                    <button type="button" class="close btn btn-warning" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-light">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="profit">


                </div>
            </div>
        </div>

    <?php $__env->stopSection(); ?>


    <?php $__env->startPush('script'); ?>
        <script>
            'use strict';
            $(document).ready(function() {
                $(document).on('click', '#calculate-btn', function() {

                    let modal = $('#calculationModal');

                    $('.selectplan').text('');
                    $('.amount').text('');
                    let id = $('#plan').val();
                    let amount = $('#amount').val();
                    var url = "<?php echo e(route('user.investmentcalculate', ':id')); ?>";
                    url = url.replace(':id', id);
                    $.ajax({
                        type: 'GET',
                        url: url,
                        data: {
                            amount: amount,
                            selectplan: id
                        },
                        success: (data) => {
                            if (data.message) {
                                iziToast.error({
                                    message: data.message + ' ' + Number(data.amount).toFixed(2),
                                    position: 'topRight',
                                });

                            } else {
                                $('#profit').html(data);
                                modal.modal('show');
                            }


                        },
                        error: (error) => {
                            if (typeof(error.responseJSON.errors.amount) !== "undefined") {
                                iziToast.error({
                                    message: error.responseJSON.errors.amount,
                                    position: 'topRight',
                                });
                            }
                            if (typeof(error.responseJSON.errors.selectplan) !== "undefined") {
                                iziToast.error({
                                    message: error.responseJSON.errors.selectplan,
                                    position: 'topRight',
                                });
                            }
                        }
                    })
                });



            });
        </script>
    <?php $__env->stopPush(); ?>


    <?php $__env->startPush('style'); ?>

    <style>
        #profit-table tr td{
            color: #fff;
        }
    </style>

    <?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u935867359/domains/naeemraaz.com/public_html/core/resources/views/frontend/home.blade.php ENDPATH**/ ?>