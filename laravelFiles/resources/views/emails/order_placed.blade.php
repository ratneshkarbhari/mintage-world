<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="date=no" />
    <meta name="format-detection" content="address=no" />
    <meta name="format-detection" content="telephone=no" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:opsz,wght@8..144,200;8..144,300;8..144,400;8..144,500;8..144,600;8..144,700;8..144,800;8..144,900&family=Salsa&display=swap" rel="stylesheet">
    <title>Your Order from Mintage World Shopping</title>
    <style type="text/css" media="screen">
        body {
            background-color: #f7f0ee;
            background-image: url(images/pattern.jpg);
            background-repeat: no-repeat repeat-y;
            background-position: center 0;
            padding: 0 !important;
            margin: 0 !important;
            display: block !important;
            min-width: 100% !important;
            width: 100% !important;
            background: #f7f0ee;
            -webkit-text-size-adjust: none
        }

        a {
            color: #ef5751;
            text-decoration: none
        }

        p {
            padding: 0 !important;
            margin: 0 !important
        }

        img {
            -ms-interpolation-mode: bicubic;
            /* Allow smoother rendering of resized image in Internet Explorer */
        }

        .text a {
            color: #ef5751 !important;
            text-decoration: underline !important;
        }

        table tr td {
            padding: 10px;
            line-height: 22px;
            font-size: 14px;
            font-family: Helvetica, Arial, sans-serif;
        }

        table tr td label {
            font-weight: 600;
        }

        /* Mobile styles */
        @media only screen and (max-width: 480px) {

            .mobile-shell {
                width: 100% !important;
                margin-bottom: 10px;
                max-width: 100%
            }

            .mobile-shell tr td,
            .mobile-shell tr th {
                padding: 5px !important;
                line-height: 18px !important;
                font-size: 13px !important;
            }

            h2,
            h4,
            p {
                font-size: 14px !important;
                padding: 0px !important;
                margin: 0px 0px 5px 0px !important;
            }

            h3 {
                font-size: 12px !important;
            }

            .mobile-shell tr td p {
                font-size: 12px !important;
            }
        }
    </style>
</head>

<body class="body" style="background-color:#F6F6F6; padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f7f0ee; -webkit-text-size-adjust:none">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #F6F6F6;font-family: Helvetica,Arial,sans-serif" align="center">
        <tbody>
            <tr>
                <td style="text-align: center; font-family: Helvetica,Arial,sans-serif">
                    <table width="700" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="margin: 0px auto;border: solid 1px #cfcfcf;font-family: Helvetica,Arial,sans-serif" bgcolor="#fff">
                        <tbody>
                            <tr>
                                <td> <a href="https://www.mintageworld.com/" target="_blank"><img src="https://www.mintageworld.com/public/img/zf2-logo.png" alt="" style="max-width: 100%;"></a> </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: solid 1px #cfcfcf;padding: 10px;line-height: 22px;font-size: 14px;">
                                    <h2 style="text-align: center;	color: #e19726;	font-size: 22px;padding: 10px 0px;	margin: 0px; font-family: Helvetica,Arial,sans-serif">Booking Information</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                    <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;">
                                        <tr style="background-color: #742702; color: #FFF;">
                                            <th colspan="2" style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                                Order Details
                                            </th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px; vertical-align:top"><b>Order No : </b> <label for="" id="lblInvoiceNo">{{$orderid}}</label><br>
                                                <b>Order Date : </b> <label for="" id="lblOrderDate">{{$date}}</label>

                                            </td>
                                        </tr>
                                    </table>
                                    <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;">
                                        <tr style="background-color: #742702; color: #FFF;">
                                            <th colspan="2" style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                                Payment Details
                                            </th>
                                        </tr>
                                        <tr>
                                            <td style="  text-align: left;font-size: 14px;"><b>Payment Method : Razorpay</b> 
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style=" padding-top: 0;padding-bottom: 2px; text-align: left;font-size: 14px;"><b>Order Status : {{$status}}</b> 
                                            </td>

                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @if(in_array($status,["Dispatched","Delivered"]))
                            <tr>
                                <td>
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell">
                                        <tr style="background-color: #742702; color: #FFF;">
                                            <th style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">Dispatch Details</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                                <b>Order Status : </b> <label for="" id="lblOrderStatus">{{$status}}</label><br>
                                                <label for="" id="lblDisDetail">{{$courier_name}} - {{$tracking_number}} - {{$courier_date}}</label>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td style="text-align:left;padding: 10px;line-height: 22px;font-size: 14px;">
                                    <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;">
                                        <tr style="background-color: #742702; color: #FFF;">
                                            <th style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">Payment Address</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;"><label for="" id="lblShippingName">{{$full_name}}</label><br>

                                            {!!$payment_address!!}

                                            </td>
                                        </tr>
                                    </table>
                                    <table width="50%" border="0" cellspacing="0" cellpadding="0" class="mobile-shell" style="float:left;">
                                        <tr style="background-color: #742702; color: #FFF;">
                                            <th style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">Shipping Address</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;"><label for="" id="lblShippingName">{{$full_name}}</label><br>
                                            
                                            {!!$shipping_address!!}

                                            
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr>
                                <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;">
                                    <table width="700" border="0px" cellspacing="0" cellpadding="0" class="mobile-shell" style="border-collapse: collapse;">
                                        <tbody>
                                            <tr style="background-color: #742702; color: #FFF;">
                                                <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px;">Product Name</th>
                                                <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px; text-align: right;">Qty.</th>
                                                <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px; text-align: right;">Price</th>
                                                <th style="color: #FFF;padding: 10px;line-height: 22px;font-size: 14px; text-align: right;">Total</th>
                                            </tr>
                                            @php
                                            $subtotal = 0.00;
                                            @endphp
                                            @foreach($products as $product)
                                            <tr>
                                                <td style="text-align: left;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><label for="" id="lblProductName">{{$product['title']}}
                                                        
                                                    </label></td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><label for="" id="lblQty">{{$product['quantity']}}</label></td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><label for="" id="lblPrice">{{$product['price']}}</label></td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblTotalPrice">{{$amount = $product['price']*$product['quantity']}}</label></td>
                                            </tr>
                                            @php
                                            $subtotal+=$amount;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="3" style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;">Sub Total </td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblSubTotal">{{$subtotal}}</label></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;">Discount</td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblDiscount">{{$discount}}</label></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;">Shipping</td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"> <label for="" id="lblFreeShipping">{{$shipping}}</label></td>
                                            </tr>

                                            <tr>
                                                <td colspan="3" style="text-align: right;padding: 10px;line-height: 22px;font-size: 14px;border:solid 1px #cfcfcf;"><b>Total</b> <small>(Prices are inclusive of all taxes)</small></td>
                                                <td style="text-align: right;padding: 10px;line-height: 22px;font-size: 16px; font-weight: 600;border:solid 1px #cfcfcf;"><b><label for="" id="lblGrossTotal">{{$subtotal+$shipping-$discount}}</label></b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 10px 0px;line-height: 22px;font-size: 14px;border-bottom: solid 1px #cfcfcf;text-align:center;font-family: Helvetica,Arial,sans-serif">
                                    <p style="font-size:13px;margin:0px; font-family: Helvetica,Arial,sans-serif">
                                        You received this email because you are registered with Mintage World by <a href="http://www.mintageworld.com" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.mintageworld.com&amp;source=gmail&amp;ust=1705480800930000&amp;usg=AOvVaw0LiFf7pJGoEZi3HUZTtBZ4">www.mintageworld.com</a></p>
                                    Registered Office: 2-C, Thakar Indl. Estate N. M. Joshi Marg,<br>Lower Parel (E), Mumbai - 400 011.<br>
                                    Email: <a href="mailto:shop@mintageworld.com">shop@mintageworld.com</a>,<br> Contact: 022 - 40190400
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>