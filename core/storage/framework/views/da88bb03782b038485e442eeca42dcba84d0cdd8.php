<!-- resources/views/invoice.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <!-- Add this in the head section of your HTML -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <title>Invoice</title>
    <style id="style">
        /* Your regular styles here */
        body {
            font-family: 'Arial', sans-serif;
            width: 400px;
            height: 700px;
            margin: 20px auto;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        .container {
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

        /* Print styles */
        @media  print {
            #print-invoice {
                display: none;
            }

            body {
                width: 100%;
                height: auto;
                margin: 0;
                padding: 0;
            }

            .container {
                border-radius: 0;
            }
        }
    </style>
</head>

<body>
    <div id="invoice" class="container">
        <img src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="50%" alt="pp">
        <h2>Invoice</h2>

        <div class="invoice-item">
            <span class="invoice-label">Transaction ID:</span>
            <span class="invoice-value"><?php echo e($data['Trx']); ?></span>
        </div>

        <div class="invoice-item">
            <span class="invoice-label">User:</span>
            <span class="invoice-value"><?php echo e($data['User']); ?></span>
        </div>

        <div class="invoice-item">
            <span class="invoice-label">Gateway:</span>
            <span class="invoice-value"><?php echo e($data['Gateway']); ?></span>
        </div>

        <div class="invoice-item">
            <span class="invoice-label">Amount:</span>
            <span class="invoice-value"><?php echo e($data['Amount']); ?></span>
        </div>

        <div class="invoice-item">
            <span class="invoice-label">Currency:</span>
            <span class="invoice-value"><?php echo e($data['Currency']); ?></span>
        </div>

        <div class="invoice-item">
            <span class="invoice-label">Charge:</span>
            <span class="invoice-value"><?php echo e($data['Charge']); ?></span>
        </div>

        <div class="invoice-item">
            <span class="invoice-label">Payment Date:</span>
            <span class="invoice-value"><?php echo e($data['PaymentDate']); ?></span>
        </div>
        <div class="image">
            <img src="/asset/done.png" alt="helo">
        </div>
    </div>
    <button id="print-invoice" onclick="printInvoice()">
        Print Invoice
    </button>






    <script>
        async function printInvoice() {
            document.getElementById('print-invoice').style.display = 'none';

            try {
                const canvas = await html2canvas(document.getElementById('invoice'));
                const imgData = canvas.toDataURL('image/png');

                // Create a link element
                const downloadLink = document.createElement('a');
                downloadLink.href = imgData;
                downloadLink.download = 'invoice.png';

                // Append the link to the body
                document.body.appendChild(downloadLink);

                // Trigger a click on the link to initiate the download
                downloadLink.click();

                // Remove the link from the DOM
                document.body.removeChild(downloadLink);
            } catch (error) {
                // console.error(error);
            } finally {
                document.getElementById('print-invoice').style.display = 'block';
            }
        }
    </script>




</body>



</html>
<?php /**PATH C:\Users\Junaid Ali\Desktop\www\invest4sale\core\resources\views/theme2/invoice.blade.php ENDPATH**/ ?>