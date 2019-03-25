<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>

        <!-- Bootstrap - Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
<!-- Bootstrap core CSS     -->
    <link href="{{ url('/') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ url('/') }}/css/material-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ url('/') }}/css/demo.css" rel="stylesheet" />


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <!-- Load google font
        ================================================== -->
        <script type="text/javascript">
            WebFontConfig = {
                google: { families: [ 'Open+Sans:300,400,500','Lato:900', 'Poppins:400', 'Catamaran:300,400,500,600,700'] }
            };
            (function() {
                var wf = document.createElement('script');
                wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + 
                '://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
                wf.type = 'text/javascript';
                wf.async = 'true';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(wf, s);
            })();
        </script>

        <!-- Load other scripts
        ================================================== -->
        <script type="text/javascript">
            var _html = document.documentElement,
                isTouch = (('ontouchstart' in _html) || (navigator.msMaxTouchPoints > 0) || (navigator.maxTouchPoints));

            _html.className = _html.className.replace("no-js","js");

            isTouch ? _html.classList.add("touch") : _html.classList.add("no-touch");
        </script>
        <script type="text/javascript" src="js/device.min.js"></script>
    </head>
    <body>
        <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="{{ url('/') }}/img/sidebar-1.jpg">

            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->

            <div class="logo">
                <img class="img-responsive" width="30" height="40" src="{{ url('/') }}/img/logo.png" alt="Cryptvault">
                <a href="/" >
                    Cryptvault
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    
                    @if (Sentinel::check() && Sentinel::inRole('administrator'))
                            <li class="{{ Route::is('get.pay') ? 'active' : '' }}">
                        <a href="{{ route('get.pay') }}">
                            <i class="material-icons">person</i>
                            <p>Payments</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('get.witu') ? 'active' : '' }}">
                        <a href="{{ route('get.witu') }}">
                            <i class="material-icons">person</i>
                            <p>Withdrawals</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('wallets.index') ? 'active' : '' }}">
                        <a href="{{ route('wallets.index') }}">
                            <i class="material-icons">person</i>
                            <p>Wallets</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('plans.index') ? 'active' : '' }}">
                        <a href="{{ route('plans.index') }}">
                            <i class="material-icons">person</i>
                            <p>Plans</p>
                        </a>
                    </li>
                    @else
                    <li class="{{ Route::is('get.trans') ? 'active' : '' }}">
                        <a href="{{ route('get.trans') }}">
                            <i class="material-icons">local_atm</i>
                            <p>Transactions</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('get.dep') ? 'active' : '' }}">
                        <a href="{{ route('get.dep') }}">
                            <i class="fa fa-btc"></i>
                            <p>Deposit Funds</p>
                        </a>
                    </li>
                   <!--  <li>
                        <a href="{{ route('get.dep') }}">
                            <i class="material-icons">description</i>
                            <p>Upload Documents</p>
                        </a>
                    </li> -->

                    <li class="{{ Route::is('get.wit') ? 'active' : '' }}">
                        <a href="{{ route('get.wit') }}">
                            <i class="material-icons">money</i>
                            <p>Withdraw Funds</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('userwallets.index') ? 'active' : '' }}">
                        <a href="{{ route('userwallets.index') }}">
                            <i class="material-icons">account_balance_wallet</i>
                            <p>Wallet</p>
                        </a>
                    </li>
                    <li class="{{ Route::is('ref.index') ? 'active' : '' }}">
                        <a href="{{ route('ref.index') }}">
                            <i class="material-icons">supervisor_account</i>
                            <p>Referrals</p>
                        </a>
                    </li>
                   
                    @endif
                    
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                        
                        @if (Sentinel::check() && Sentinel::inRole('administrator'))
                            <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li>
                        @endif
                    </ul>
                        <ul class="nav navbar-nav navbar-right">
                            @if (Sentinel::check())
                            <li><p class="navbar-text">{{ Sentinel::getUser()->first_name }}</p></li>
                            @else
                            <li><a href="{{ route('auth.login.form') }}">Login</a></li>
                            <li><a href="{{ route('auth.register.form') }}">Register</a></li>
                            @endif
                            <li>
                                <a href="{{ route('dashboard') }}" class="dropdown-toggle">
                                    <i class="material-icons">dashboard</i>
                                    <p class="hidden-lg hidden-md">Dashboard</p>
                                </a>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <i class="material-icons">person</i>
                                   <p class="hidden-lg hidden-md">Profile</p>
                               </a>
                               <ul class="dropdown-menu">
                                @if (Sentinel::check())
                                <li><a href="{{ route('view.account', Sentinel::getUser()->id) }}">Manage Account</a></li>
                                <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                                @endif
                                  </ul>
                            </li>
                        </ul>

                        
                    </div>
                </div>
            </nav>
            <input type="hidden" id="btcc" name="btc" value="{{ Config::get('siteVar.btcadd1') }}">
        
            @include('Centaur::notifications')
            @yield('content')
        <div class="container">
        <footer class="footer">
                <div class="container">
                    
                    <p class="copyright">
                        &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">CryptVault</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
    </div>
    <div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Send Alert</h4>
      </div>
      <div class="modal-body">
        <form accept-charset="UTF-8" role="form" method="post" action="{{ route('alert.send') }}">
            <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Transaction Id:</label>
                                                    <input type="text" value="{{$depo->trans_id }}" name="amount"class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Amount Paid:</label>
                                                    <input type="text" name="amount" class="form-control" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date</label>
                                                    <input type="date" name="date" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                         <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                        <input name="dep_id" value="{{ $depo->id }}" id="dep" type="hidden">
                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
            
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>

  </div>
</div>

        <!--   Core JS Files   -->
    <script src="{{ url('/') }}/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/js/material.min.js" type="text/javascript"></script>
    <script src="{{ url('/') }}/js/jquery-qrcode.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="{{ url('/') }}/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ url('/') }}/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="{{ url('/') }}/js/material-dashboard.js"></script>

    <script src="{{ url('/') }}/js/demo.js"></script>
    <div id="btn-to-top-wrap">
            <a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="800"></a>
        </div>

       <!--  <script src="js/jquery-2.2.4.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-2.2.4.min.js"><\/script>')</script> -->

        <script type="text/javascript" src="js/main.min.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

                <!-- BEGIN JIVOSITE CODE {literal} -->
        <script type='text/javascript'>
        (function(){ var widget_id = 'Paw7lkpeN6';var d=document;var w=window;function l(){
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
        <!-- {/literal} END JIVOSITE CODE -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <!-- Latest compiled and minified Bootstrap JavaScript -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
        <!-- Restfulizer.js - A tool for simulating put,patch and delete requests -->
        <script src="{{ asset('restfulizer.js') }}"></script>

        <script>
     $(document).ready(function(){

        new ClipboardJS('#byn');


       

      


      $('#qrcode a').qrcode({ 
        render: 'image',
        text: $("#btcc").val(),
        ecLevel: 'L',
        size: "203"
    });


       

         $("#investment").change(function(){
              

             rob = $("#pran").val();
             robocharge = $("#charge").val();
             investment = $("#investment").val();  
             subTotal   = (parseFloat(investment)*parseFloat(rob))/100;
              
             Total   = Number(investment) + Number(robocharge);
             $("#profito").val(subTotal);
             $("#total").val(Total);

         })
         

     })
</script>
    </body>
</html>




