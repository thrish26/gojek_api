<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="zxx"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>{{$settings->site->site_title}}</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<link rel="icon" type="image/png" href="favicon.png">
<link rel='stylesheet' type='text/css' href="https://gridetech.com/assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


</style>
	</head>
	<body style="background: #f7f7f7;">
        <div style="box-shadow:0 0 10px #dad9d9; display: block;width: 750px;min-height: 500px;justify-content: center;margin: 20px auto;box-sizing: border-box;background: #fff;padding: 40px 30px;font-family: sans-serif;border: 4px;border-color: #fff; border-radius: 10px;">
            <div style="width: 100%; text-align: center; margin-bottom: 30px;">
                <div class="logo"><img style="width: 130px;" src="{{$settings->site->site_logo}}"></div>
            </div>

       <div class="mailContent" style="line-height: 20px;font-size: 15px;margin-bottom: 30px;">
            <p style="font-size: 16px; font-weight: 700;">Hello, {{$data['body']->request->user->first_name}} {{$data['body']->request->user->last_name}}</p>
            <h4 style="font-weight: 600;">Thanks for ordering online on {{$settings->site->site_title}}</h4>
            <p>We hope you enjoyed your order from KFC.</p>
            <p>If you have any feedback for<b> {{$settings->site->site_title}} </b>, or about your ordering experience, we’d love to hear from you – simply reply to this email and we’ll be in touch.</p>
            <p style="margin-bottom: 0;">&nbsp;</p>
            <div class="order-table" style="background:#f7f7f7; margin: 0 auto">
                <table style="width: 80%; margin: 0 auto;">
                    <tbody>
                        <h5 style="text-align: center; padding-top: 30px; font-size: 17px;"> Order Summary </h5>

                        <tr style="border-bottom:1px solid #cbcbc8">
                            <td style="font-family:sans-serif;font-size:16px;line-height:17px;color:#7d7d76;text-align:left;width:30%">
                              Order ID: {{$data['body']->request->store_order_invoice_id}}
                            </td>
                            <td style="font-family:sans-serif;font-size:12px;line-height:20px;color:#7d7d76;text-align:right">
                              Date: {{$data['body']->request->assigned_time}} <br>
                            {{$data['body']->request->delivery->map_address}}
                            </td>
                        </tr>
                        @foreach($data['body']->request->order_invoice->items as $item)
                        <tr style="border-bottom:1px solid #cbcbc8">
                            <td valign="middle" width="70%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;padding-bottom:5px;text-align:left">
                              {{$item->product->item_name}} <span style="font-size:12px">{{$data['body']->request->currency}}({{$item->quantity}} * {{$item->item_price}})</span>
                            </td>
                            <td valign="middle" width="30%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;padding-bottom:5px;text-align:right">
                            {{$data['body']->request->currency}}{{$item->total_item_price}}
                            </td>
                        </tr>
                        @endforeach

                          
                         <tr>
                            <td valign="middle" width="70%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;text-align:left">
                              Packaging Charge
                            </td>
                            <td valign="middle" width="30%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;text-align:right">
                              {{$data['body']->request->currency}}{{$data['payment']->store_package_amount}}
                            </td>
                        </tr>

                        <tr>
                            <td valign="middle" width="70%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;padding-bottom:5px;text-align:left">
                              Delivery Charge
                            </td>
                            <td valign="middle" width="30%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;padding-bottom:5px;text-align:right">
                              {{$data['body']->request->currency}}{{$data['body']->request->order_invoice->delivery_amount}}
                            </td>
                        </tr>

                        

                        @if($storeOrder->promocode != null)
                        <tr style="border-bottom:1px solid #cbcbc8">
                            <td valign="middle" width="70%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;padding-bottom:5px;text-align:left">
                              Promo - {{$storeOrder->promocode->promo_code}}
                            </td>
                            <td valign="middle" width="30%" style="font-family:sans-serif;font-size:14px;line-height:30px;color:#2d2d2a;padding-bottom:5px;text-align:right">
                              ({{$data['body']->request->currency}}{{$data['payment']->promocode_amount}})
                            </td>
                        </tr>
                        @endif
                        
                        <tr>
                          <td style="font-family:sans-serif;font-size:12px;line-height:17px;color:#7d7d76;padding-top:10px;text-align:left">

                          </td>
                        </tr>

                        <tr>
                            <td valign="middle" width="70%" style="font-family:sans-serif;font-size:14px;line-height:21px;color:#2d2d2a;padding-bottom:15px;text-align:left">
                                Total Amount 
                                Includes {{$data['body']->request->currency}}{{$data['payment']->tax_amount}} Taxes
                            </td>
                            <td valign="middle" width="30%" style="font-family:sans-serif;font-size:14px;line-height:21px;color:#2d2d2a;padding-bottom:15px;text-align:right">
                              {{$data['body']->request->currency}}{{$data['payment']->gross}}                        
                          </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p style="margin-top: 0;">&nbsp;</p>
        <div style="font-size: 12px;line-height: 18px; margin-top: 60px;">
            <div style="text-align:center; margin-bottom: 10px;">
                <a style="border-radius:50px; display: inline-block;width: 20px;height: 20px;padding: 5px;background: #000; color: #fff" target="_blank" href="https://www.facebook.com/"><i class="fa fa-facebook" style="font-size: 20px;"></i></a>
                <a style="border-radius:50px;display: inline-block;width: 20px;height: 20px;padding: 5px;background: #000; color: #fff" target="_blank" href="https://twitter.com/"><i class="fa fa-twitter" style="font-size: 20px;"></i></a>
                <a style="border-radius:50px;display: inline-block;width: 20px;height: 20px;padding: 5px;background: #000; color: #fff" target="_blank" href="#"><i class="fa fa-instagram" style="font-size: 20px;"></i></a>
            </div>
            <p style="margin-top: 5px; text-align:center;">Copyrights 2020 All Rights Reserved.</p>
        </div>
                </div>
            </div>
	</body>
</html>