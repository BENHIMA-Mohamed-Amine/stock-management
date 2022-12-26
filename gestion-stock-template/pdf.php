<?php
require_once("../php/Class/Sale.php");
if (isset($_GET['num_com'])) {
    extract($_GET);
    $sale = Sale::displaySaleWithPr($num_com);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        * {
            margin 0;
            padding: 0;
            font-family: 'Open Sans', sans-serif;
        }

        div {
            padding: 20px;
        }

        .content {
            margin: auto;
            width: 700px;
            /* background-color: #eee; */
        }

        .header .left-p {
            display: inline-block;
            margin-left: 25px;
            color: #fe9f43;
            font-size: 21px;
        }

        .header p {
            display: inline-block;
            font-size: 21px;
            color: #fe9f43;
            letter-spacing: -1px;
            line-height: 1;
            margin-left: 400px;
        }

        .main p.left {
            color: #5b5b5b;
            line-height: 18px;
            vertical-align: top;
            text-align: left;
            font-size: 12px;
        }

        .main p.right {
            font-size: 12px;
            color: #5b5b5b;
            line-height: 18px;
            vertical-align: top;
            text-align: right;
            margin-top: -47px;
            margin-bottom: 47px;
        }

        table {
            width: 70%;
            margin: auto;
            border-collapse: collapse;
        }


        td,
        th {
            border-bottom: 1px solid #5b5b5b;
        }

        th {
            height: 60px;
        }

        table tr {
            border-bottom: #5b5b5b 1px solid;
            margin-bottom: 5px;
        }

        table tr td {
            /* display: inline-block; */
            /* margin-left: 75px; */
            color: #5b5b5b;
            font-size: 15px;
            height: 60px;
            text-align: center;
        }

        .tr-right {
            text-align: right;
        }

        .footer p {
            line-height: 18px;
            font-size: 12px;
            color: #5b5b5b;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="header">
            <p class="left-p">AMITAM STORE</p>
            <p>Invoice</p>
        </div>
        <div class="main">
            <p class="left">
                Hello, <?= $sale[0]['nom'] . " " . $sale[0]['prenom'] ?>.<br>
                Thank you for shopping from our store.
            </p>
            <p class="right">
                ORDER <?= $sale[0]['num_com'] ?><br>
                IN <?= $sale[0]['date_com'] ?>
            </p>
        </div>
        <!-- <div class="table">
            <ul>
                <li>Product</li>
                <li>Purchase price</li>
                <li>Quantity</li>
                <li>Sub Total</li>
            </ul>
            <hr>
            <ul>
                <li>iphone 14</li>
                <li>10000 DH</li>
                <li>1</li>
                <li>20000 dh</li>
            </ul>
            <hr>
        </div> -->
        <table>
            <tr>
                <th>Product</th>
                <th>Purchase price</th>
                <th>Quantity</th>
                <th>Sub Total(DH)</th>
            </tr>
            <?php
            $somme = 0;
            foreach ($sale as $item):
                $somme += $item['qte_pr'] * $item['prix_vente'];
            ?>
            <tr>
                <td><?= $item['lib_pr'] ?></td>
                <td><?= $item['prix_vente'] ?></td>
                <td><?= $item['qte_pr'] ?></td>
                <td><?= $item['qte_pr'] * $item['prix_vente'] ?></td>
            </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="3" class="td-right"><strong>Grand Total (DH): </strong></td>
                <td class="td-right"><?= $somme ?></td>
            </tr>
        </table>
        <div class="footer">
            <p>Have a nice day.</p>
        </div>
    </div>
</body>

</html>