<?php
// Include autoloader 
require_once 'dompdf/autoload.inc.php';

// Reference the Dompdf namespace 
use Dompdf\Dompdf;

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();


ob_start();
// Load content from html file 
$html = require_once "pdf.php";
$html = ob_get_contents();
// $html = $html = <<<EOT
// <!DOCTYPE html>
// <html lang="en">

// <head>
//     <meta charset="UTF-8">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <title>Bill</title>
//     <style>
//         * {
//             margin 0;
//             padding: 0;
//             font-family: 'Open Sans', sans-serif;
//         }

//         div {
//             padding: 20px;
//         }

//         .content {
//             margin: auto;
//             width: 700px;
//             /* background-color: #eee; */
//         }

//         .header img {
//             width: 20px;
//             display: inline-block;
//             margin-left: 100px;
//         }

//         .header p {
//             display: inline-block;
//             font-size: 21px;
//             color: #fe9f43;
//             letter-spacing: -1px;
//             line-height: 1;
//             margin-left: 440px;
//         }

//         .main p.left {
//             color: #5b5b5b;
//             line-height: 18px;
//             vertical-align: top;
//             text-align: left;
//             font-size: 12px;
//         }

//         .main p.right {
//             font-size: 12px;
//             color: #5b5b5b;
//             line-height: 18px;
//             vertical-align: top;
//             text-align: right;
//             margin-top: -47px;
//             margin-bottom: 47px;
//         }

//         table {
//             width: 70%;
//             margin: auto;
//             border-collapse: collapse;
//         }


//         td,
//         th {
//             border-bottom: 1px solid #5b5b5b;
//         }

//         th {
//             height: 60px;
//         }

//         table tr {
//             border-bottom: #5b5b5b 1px solid;
//             margin-bottom: 5px;
//         }

//         table tr td {
//             /* display: inline-block; */
//             /* margin-left: 75px; */
//             color: #5b5b5b;
//             font-size: 15px;
//             height: 60px;
//             text-align: center;
//         }

//         .tr-right {
//             text-align: right;
//         }

//         .footer p {
//             line-height: 18px;
//             font-size: 12px;
//             color: #5b5b5b;
//         }
//     </style>
// </head>

// <body>
//     <div class="content">
//         <div class="header">
//             <img src="facture/logo-small.png" alt="logo">
//             <p>Bill</p>
//         </div>
//         <div class="main">
//             <p class="left">
//                 Hello, Haitam Belcaida.<br>
//                 Thank you for shopping from our store and for<br>
//                 your order.
//             </p>
//             <p class="right">
//                 ORDER #800000025<br>
//                 MARCH 4TH 2016
//             </p>
//         </div>
//         <!-- <div class="table">
//             <ul>
//                 <li>Product</li>
//                 <li>Purchase price</li>
//                 <li>Quantity</li>
//                 <li>Sub Total</li>
//             </ul>
//             <hr>
//             <ul>
//                 <li>iphone 14</li>
//                 <li>10000 DH</li>
//                 <li>1</li>
//                 <li>20000 dh</li>
//             </ul>
//             <hr>
//         </div> -->
//         <table>
//             <tr>
//                 <th>Product</th>
//                 <th>Purchase price</th>
//                 <th>Quantity</th>
//                 <th>Sub Total</th>
//             </tr>
//             <tr>
//                 <td>Product</td>
//                 <td>Purchase price</td>
//                 <td>Quantity</td>
//                 <td>Sub Total</td>
//             </tr>
//             <tr>
//                 <td colspan="3" class="td-right"><strong>Grand Total : </strong></td>
//                 <td class="td-right">344.90</td>
//             </tr>
//         </table>
//         <div class="footer">
//             <p>Have a nice day.</p>
//         </div>
//     </div>
// </body>

// </html>
// EOT;

$dompdf->loadHtml($html);
ob_end_clean();

// (Optional) Setup the paper size and orientation 
// $orientation = 'landscape';
// $customPaper = array(0, 0, 950, 950);
// $dompdf->setPaper($customPaper, $orientation);
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF 
$dompdf->render();


// Output the generated PDF (1 = download and 0 = preview) 
$dompdf->stream("invoice.pdf", array("Attachment" => 0));