<?php $__env->startSection('content2'); ?>
<style>
    .card{
        height: 100%;
    }
    .float-right{
        float: right;
    }
</style>
    <div class="dashboard-body-part">
        <?php
            $reference = auth()->user()->refferals;
        ?>
        <div class="container mt-3 mb-5">
            <div class="row">


                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title" style="text-align: center"></h6>
                        <p class="card-text text-white">Paid Members: <?php echo e($total_team_count_paid); ?></p>

                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title" style="text-align: center"></h6>
                        <p class="card-text text-white">Non-paid Members: <?php echo e($total_team_count); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title" style="text-align: center"></h6>
                        <p class="card-text text-white">Direct Paid Members: <?php echo e($directR_paid_user); ?></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title" style="text-align: center"></h6>
                        <p class="card-text text-white">Direct Non-paid Members: <?php echo e($direct_refarral_nonpaid); ?></p>
                        </div>
                    </div>
                </div>

              <!-- Add more cards here as needed -->
            </div>
          </div>

        <div class="row">
            <div class="col-md-12">
                <form class="row g-3" action="<?php echo e(route('user.team')); ?>" method="get">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="type" value="1" >
                    <div class="col-11">
                      <label for="" class="visually-hidden">Email</label>
                      <input class="form-control" type="text" name="email" placeholder="Search By Email">
                    </div>
                    <div class="col-1">
                      <button type="submit" class="btn btn-primary mb-3">Search</button>
                    </div>
                  </form>
            </div>
            <?php if(!empty($inpuEmail) && $search_count > 0): ?>
                <div class="col-md-12">
                    <div class="card p-2">
                        <p style="font-weight: bold; font-size:25px;"><?php echo e(!empty($inpuEmail)? $inpuEmail.' - Is In Your Team':''); ?></p>
                    </div>
                </div>
            <?php elseif(!empty($inpuEmail) && $search_count == 0): ?>
                <div class="col-md-12">
                    <div class="card p-2">
                        <p style="font-weight: bold; font-size:25px;"><?php echo e(!empty($inpuEmail)? $inpuEmail.' - Not Is In Your Team':''); ?></p>
                    </div>
                </div>
            <?php else: ?>

            <?php endif; ?>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><?php echo e(__('My Team')); ?></h5>
                    </div>
                    <div class="card-body">
                        <?php if($reference->count() > 0): ?>
                            <ul class="sp-referral">
                                <li class="single-child root-child">
                                    <p>
                                        <img src="<?php echo e(getFile('user', auth()->user()->image)); ?>">
                                        <span class="mb-0"><?php echo e(auth()->user()->full_name .' - '. currentPlan(auth()->user())); ?></span>
                                    </p>
                                    <ul class="sub-child-list step-2">
                                        <?php $__currentLoopData = $reference; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="single-child">
                                                <p>
                                                    <img src="<?php echo e(getFile('user', $user->image)); ?>">
                                                    <span class="mb-0"><?php echo e($user->full_name.' - '. currentPlan($user)); ?></span>
                                                </p>

                                                <ul class="sub-child-list step-3">
                                                    <?php $__currentLoopData = $user->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li class="single-child">
                                                            <p>
                                                                <img src="<?php echo e(getFile('user', $ref->image)); ?>">
                                                                <span class="mb-0"><?php echo e($ref->full_name.' - '. currentPlan($ref)); ?></span>
                                                            </p>

                                                            <ul class="sub-child-list step-4">
                                                                <?php $__currentLoopData = $ref->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li class="single-child">
                                                                        <p>
                                                                            <img src="<?php echo e(getFile('user', $ref2->image)); ?>">
                                                                            <span
                                                                                class="mb-0"><?php echo e($ref2->full_name.' - '. currentPlan($ref2)); ?></span>
                                                                        </p>
                                                                        <ul class="sub-child-list step-5">
                                                                            <?php $__currentLoopData = $ref2->refferals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li class="single-child">
                                                                                    <p>
                                                                                        <img src="<?php echo e(getFile('user', $ref3->image)); ?>">
                                                                                        <span
                                                                                            class="mb-0"><?php echo e($ref3->full_name.' - '. currentPlan($ref3)); ?></span>
                                                                                    </p>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </ul>

                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                                </li>
                            </ul>
                        <?php else: ?>
                            <div class="col-md-12 text-center mt-5">
                                <i class="far fa-sad-tear display-1"></i>
                                <p class="mt-2">
                                    <?php echo e(__('No Team Member Found')); ?>

                                </p>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>




    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>

        .sp-referral .single-child {
            padding: 6px 10px;
            border-radius: 5px;
        }

        .sp-referral .single-child+.single-child {
            margin-top: 15px;
        }

        .sp-referral .single-child p {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }

        .sp-referral .single-child p img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            object-fit: cover;
            -o-object-fit: cover;
        }



        .sp-referral .single-child p span {
            width: calc(100% - 35px);
            font-size: 14px;
            padding-left: 10px;
        }

        .sub-child-list {
            position: relative;
            padding-left: 35px;
        }

        .sub-child-list::before {
            position: absolute;
            content: '';
            top: 0;
            left: 17px;
            width: 1px;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sp-referral>.single-child.root-child>.sub-child-list::before {
            background-color: var(--main-color);
        }

        .sub-child-list>.single-child {
            position: relative;
        }

        .sub-child-list>.single-child::before {
            position: absolute;
            content: '';
            left: -18px;
            top: 21px;
            width: 30px;
            height: 5px;
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 0 0 0 5px;
        }

        .sp-referral>.single-child.root-child > p img  {
            border: 2px solid #5463ff;
        }

        .sub-child-list.step-2 > .single-child > p img {
            border: 2px solid #0aa27c;
        }
        .sub-child-list.step-3 > .single-child > p img {
            border: 2px solid #a20a0a;
        }
        .sub-child-list.step-4 > .single-child > p img {
            border: 2px solid #f562e6;
        }
        .sub-child-list.step-5 > .single-child > p img {
            border: 2px solid #a20a0a;
        }

      /* welcome msg after login css */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
        z-index: 1000;
    }

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px 20px;
  border: 1px solid #888;
  width: 50%;
  text-align: center;
}

@media(max-width:767px){
   .modal-content {
        width: 90%;
    }
}

.login-image{
    width: 75%;
    margin-left: 12.5%;
}

.close {
  position: absolute;
  right:15px;
  top:0;
  font-size: 2.5em;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
/* welcome msg after login css end  */

    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/team.blade.php ENDPATH**/ ?>