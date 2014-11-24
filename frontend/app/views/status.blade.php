<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Bitcoin Mixer - mix your Bitcoins and stay anonymous!</title>

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">
{{ HTML::style('css/style.css') }}
{{ HTML::style('css/modalwindow.css') }}


{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/jquery.stellar.min.js') }}
{{ HTML::script('js/waypoints.min.js') }}
{{ HTML::script('js/jquery.easing.1.3.js') }}

  <script src='http://api.tiles.mapbox.com/mapbox.js/v1.0.2/mapbox.js'></script>
  <link href='http://api.tiles.mapbox.com/mapbox.js/v1.0.2/mapbox.css' rel='stylesheet' />
  <!--[if lte IE 8]>
    <link href='http://api.tiles.mapbox.com/mapbox.js/v1.0.2/mapbox.ie.css' rel='stylesheet' >
  <![endif]-->
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-f8081047-273e-50bd-9807-5de1313254bf", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>

</head>

<body>
    <div id="top">
        <div class="buffer">
            <a id="logo" href="{{URL::to('/')}}" class="button" data-slide="0" title="Bitcoin Mixer"></a>
        </div>
    </div>
    <div class="slide lightslide" id="slide1" data-slide="1" data-stellar-background-ratio="0.1">
        <div class="buffer content">
            <div id="modal-window">
                @if ($order)
                    <h2 class="modalheader">Order information</h2>
                    <p class="maindescriptor blockdescriptor">To mix your Bitcoins, please send {{(float)$order->amount}} BTC to this address:</p>
                    <input name="" type="text" id="destination" onclick="this.select();" value="{{$order->receive_address}}" />
                    <div class="clear"></div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="white">
                    <td class="descriptordata">Amount of Bitcoins you want to mix</td>
                    <td class="contentdata">{{(float)$order->amount}} BTC</td>
                    </tr>
                    <tr class="grey">
                    <td class="descriptordata">Our fee (1%)</td>
                    <td class="contentdata">{{(float)$order->amount * 0.01}} BTC</td>
                    </tr>
                    <tr class="white">
                    <td class="descriptordata">Amount of Bitcoins You will receive</td>
                    <td class="contentdata">{{(float)$order->amount * 0.99}} BTC</td>
                    </tr>
                    <tr class="grey">
                    <td class="descriptordata">Your address, where we will send mixed Bitcoins</td>
                    <td class="contentdata">{{$order->send_address}}</td>
                    </tr>
                    </table>
                    <h2 class="modalheader">Payment status</h2>
                    <p class="maindescriptor blockdescriptor">After we have received your payment and have 6 confirmations, we will send you mixed Bitcoins to your wallet.</p>
                    <div class="clear"></div>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr class="white">
                    <td class="descriptordata">Status</td>
                    <td class="contentdata">          
                        @if ($order->confirmations == 0)
                            Waiting for your payment
                        @elseif ($order->confirmations > 0 && $order->confirmations < 6)
                            Payment received, waiting for confirmations
                        @elseif ($order->confirmed == 1)
                            Completed
                        @endif
                    </td>
                    </tr>
                    <tr class="grey">
                    <td class="descriptordata">Amount received</td>
                    <td class="contentdata">{{(float)$order->amount_received}} BTC</td>
                    </tr>
                    <tr class="white">
                    <td class="descriptordata">Confirmations</td>
                    <td class="contentdata">{{$order->confirmations}} of 6</td>
                    </tr>
                    <tr class="grey">
                    <td class="descriptordata">URL for checking payment status</td>
                    <td class="contentdata">{{URL::to('status/'.$order->order_key)}}</td>
                    </tr>
                    </table> 
                @else
                    <h2 class="modalheader">Order not found...</h2>
                @endif
                
            </div>
        </div>
    </div><!--End Slide Main-->
    
    <div id="footer">
        <div class="buffer">
            <p>&copy; 2013 BitcoinMixer. All rights reserved.</p>
        </div>
    </div>
</body>
</html>