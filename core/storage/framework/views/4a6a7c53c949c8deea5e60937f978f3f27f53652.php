<?php $__env->startSection('content2'); ?>
    <div class="dashboard-body-part">
        <div class="h4 section-title text-capitalize"><?php echo e(str_replace('_',' ',Request('wallet'))); ?> Deposits</div>
        <div class="card-body text-end">
            <form action="" method="get" class="d-inline-flex">
                <input type="text" name="trx" class="form-control me-2" placeholder="transaction id">
                <input type="date" class="form-control me-3" placeholder="Search User" name="date">
                <button type="submit" class="cmn-btn"><?php echo e(__('Search')); ?></button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table cmn-table">
                <thead>
                    <tr>
                        <th><?php echo e(__('Trx')); ?></th>
                        <th><?php echo e(__('User')); ?></th>
                        <th><?php echo e(__('Gateway')); ?></th>
                        <th><?php echo e(__('Amount')); ?></th>
                        <th><?php echo e(__('Currency')); ?></th>
                        <th><?php echo e(__('Charge')); ?></th>
                        <th><?php echo e(__('Payment Date')); ?></th>
                        <th><?php echo e(__('Invoice')); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-caption="<?php echo e(__('Trx')); ?>"><?php echo e($transaction->transaction_id); ?></td>
                            <td data-caption="<?php echo e(__('User')); ?>">
                                <?php echo e(@$transaction->user->fname . ' ' . @$transaction->user->lname); ?></td>
                            <td data-caption="<?php echo e(__('Gateway')); ?>">
                                <?php echo e(@$transaction->gateway->gateway_name ?? 'Account Transfer'); ?></td>
                            <td data-caption="<?php echo e(__('Amount')); ?>"><?php echo e($transaction->amount); ?></td>
                            <td data-caption="<?php echo e(__('Currency')); ?>">
                                <?php echo e($transaction->gateway->gateway_parameters->gateway_currency); ?></td>
                            <td data-caption="<?php echo e(__('Charge')); ?>">
                                <?php echo e($transaction->charge . ' ' . $transaction->currency); ?></td>

                            <td data-caption="<?php echo e(__('Payment Date')); ?>"><?php echo e($transaction->created_at->format('Y-m-d')); ?>

                            </td>
                            <td data-caption="Invoice"><a href="#"
                                    data-date="<?php echo e($transaction->created_at->format('Y-m-d')); ?>"
                                    data-wallet_type=<?php echo e(rtrim($transaction->wallet_type,'s')); ?>

                                    data-deposit="<?php echo e(json_encode($transaction)); ?>" class="invoice-action"><i
                                        class="fa fa-print"></i> Invoice</a></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td class="text-center" colspan="100%">
                                <?php echo e(__('No users Found')); ?>

                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <?php if($transactions->hasPages()): ?>
                <?php echo e($transactions->links()); ?>

            <?php endif; ?>
        </div>
    </div>


    
    <!-- Modal -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div id="invoice" class="invoice-container text-center">
                        <img src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="50%" alt="pp">
                        <h2>Invoice</h2>

                        <div class="invoice-item">
                            <span class="invoice-label">Transaction ID:</span>
                            <span class="invoice-value" id="transaction_id"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">User:</span>
                            <span class="invoice-value" id="user"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">Wallet:</span>
                            <span class="invoice-value text-uppercase" id="wallet_type"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">Gateway:</span>
                            <span class="invoice-value" id="gateway"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">Amount:</span>
                            <span class="invoice-value" id="amount"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">Currency:</span>
                            <span class="invoice-value" id="currency"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">Charge:</span>
                            <span class="invoice-value" id="charge"></span>
                        </div>

                        <div class="invoice-item">
                            <span class="invoice-label">Payment Date:</span>
                            <span class="invoice-value" id="payment_date"></span>
                        </div>
                        <div class="invoice-item">
                            <span class="invoice-label">Status:</span>
                            <span class="invoice-value" >Approved</span>
                        </div>
                        <div class="image">
                            <img src="/asset/done.png" alt="helo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="download-invoice" onclick="printInvoice()"
                        class="btn btn-primary ">Download</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .invoice-container {
            max-width: 400px;
            padding: 20px;
            border-radius: 10px;
            background-color: #1b2845;
            background-image: linear-gradient(315deg, #1b2845 0%, #274060 74%);
        }

        h2 {
            text-align: center;
            color: #EDEADE;
        }

        .invoice-item {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            line-height: 30px;
        }

        .invoice-label {
            font-weight: bold;
            color: #EDEADE;
            display: inline-block;
            width: 120px;
        }

        .invoice-value {
            color: #EDEADE;
            display: inline-block;
        }

        .image img {
            /* width: 50%; */
            margin-top: 20px;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        'use strict';

        var modal = new bootstrap.Modal($("#invoiceModal"))
        var TRX = "_";

        $(document).ready(function() {
            $(".invoice-action").click(function(e) {
                e.preventDefault();
                var deposit = $(this).data('deposit');
                // console.log(deposit);
                TRX = deposit.transaction_id;
                $('#transaction_id').html(deposit.transaction_id);
                $('#user').html(`${deposit.user.fname} ${deposit.user.lname}`);
                $('#gateway').html(deposit.gateway.gateway_name);
                $('#amount').html(Number(deposit.amount).toFixed(2));
                $('#currency').html(deposit.gateway.gateway_parameters.gateway_currency);
                $('#charge').html(deposit.gateway.charge);
                $('#wallet_type').html($(this).data('wallet_type').replaceAll("_"," "));
                $('#payment_date').html($(this).data('date'));
                modal.show();
            });

        });

        async function printInvoice() {

            try {
                $("#download-invoice").text("Downloading...");
                const canvas = await html2canvas(document.getElementById('invoice'));
                const imgData = canvas.toDataURL('image/png');

                // Create a link element
                const downloadLink = document.createElement('a');
                downloadLink.href = imgData;
                downloadLink.download = TRX + '.png';

                // Append the link to the body
                document.body.appendChild(downloadLink);

                // Trigger a click on the link to initiate the download
                downloadLink.click();

                // Remove the link from the DOM
                document.body.removeChild(downloadLink);
            } catch (error) {
                $("#download-invoice").text("Error");
            } finally {
                $("#download-invoice").text("Downloaded");
            }

        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/user/deposit_log.blade.php ENDPATH**/ ?>