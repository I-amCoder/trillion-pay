<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>
        <?php if(@$general->sitename): ?>
            <?php echo e(__(@$general->sitename) . '-'); ?>

        <?php endif; ?>
        <?php echo e(__(@$pageTitle)); ?>

    </title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(getFile('icon', @$general->favicon)); ?>">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/font-awsome.min.css')); ?>">
    <?php echo csrf_field(); ?>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/summernote-bs4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/component-custom-switch.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/modules/jquery-selectric/selectric.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/bootstrap-timepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/animate.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/izitoast.min.css')); ?>">
    <?php echo $__env->yieldPushContent('style-plugin'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/modules/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('asset/admin/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo e(asset('asset/admin/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/components.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/daterangepicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/admin/css/iconpicker.css')); ?>">

    <?php echo $__env->yieldPushContent('style'); ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                </div>
            </div>
            <?php echo $__env->make('backend.layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('backend.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('backend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <?php echo $__env->yieldContent('script'); ?>

    <!-- General JS Scripts -->
    <script src="<?php echo e(asset('asset/admin/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/proper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/bootstrap.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('asset/admin/js/feather.min.js')); ?>"></script>

    <script src="<?php echo e(asset('asset/admin/js/nicescroll.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/summernote-bs4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/jquery-selectric/jquery.selectric.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/stisla.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/scripts.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/izitoast.min.js')); ?>"></script>
    <script src="<?php echo e(asset('asset/admin/js/iconpicker.js')); ?>"></script>

    <script src="<?php echo e(asset('asset/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('script-plugin'); ?>
    <script src="<?php echo e(asset('asset/admin/js/sortable.min.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('script'); ?>


    <script>
        $(function(){
            $('#search_text').on('keyup', function(){
                let val = $(this).val();
                let model = $('#model').val();

                let url = "<?php echo e(route('admin.table.filter')); ?>";

                $.ajax({
                    method:"GET",
                    url : url,
                    data:{
                        colum : $(this).data('colum'),
                        val : val,
                        model : model,
                        type : 'text'
                    },
                    success:function(response){
                       $('#filter_data').html(response)
                    }
                })
            })


            $('#dateFilter').on('change', function(){
                let val = $(this).val();
                let model = $('#model').val();

                let url = "<?php echo e(route('admin.table.filter')); ?>";

                $.ajax({
                    method:"GET",
                    url : url,
                    data:{
                        colum : $(this).data('colum'),
                        val : val,
                        model : model,
                        type : 'text'
                    },
                    success:function(response){
                        $('#filter_data').html(response)
                    }
                })
            })


            $('#optionFilter').on('change', function(){
                let val = $(this).val();
                let model = $('#model').val();

                let url = "<?php echo e(route('admin.table.filter')); ?>";

                $.ajax({
                    method:"GET",
                    url : url,
                    data:{
                        colum : $(this).data('colum'),
                        val : val,
                        model : model,
                        type : 'text'
                    },
                    success:function(response){
                        $('#filter_data').html(response)
                    }
                })
            })
        })
    </script>


    <?php if(Session::has('success')): ?>
        <script>
            "use strict";
            iziToast.success({
                message: "<?php echo e(session('success')); ?>",
                position: 'topRight'
            });
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            "use strict";
            iziToast.error({
                message: "<?php echo e(session('error')); ?>",
                position: 'topRight'
            });
        </script>
    <?php endif; ?>
    <?php if(session()->has('notify')): ?>
        <?php $__currentLoopData = session('notify'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                "use strict";
                iziToast.<?php echo e($msg[0]); ?>({
                    message: "<?php echo e(trans($msg[1])); ?>",
                    position: "topRight"
                });
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(@$errors->any()): ?>
        <script>
            "use strict";
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                iziToast.error({
                    message: '<?php echo e(__($error)); ?>',
                    position: "topRight"
                });
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </script>
    <?php endif; ?>

    <script>
        'use strict'
        var url = "<?php echo e(route('admin.changeLang')); ?>";

        $(".changeLang").change(function() {
            if ($(this).val() == '') {
                return false;
            }
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\invest4sale\core\resources\views/backend/layout/master.blade.php ENDPATH**/ ?>