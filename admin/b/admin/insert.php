<?session_start();?>

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title><?php echo "{$_SESSION['usern']}"?> | Insert</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>

         <!-- Styles -->
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed">
        <?php include('messages.php')?>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="assets/images/4.jpg" width="52" alt="David Green"/><span>David Green</span></div>
                <div class="profile-menu-list">
                    <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                    <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                    <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        
        <main class="page-content content-wrap">

            <?php include('top_navigation.php');?>
            <?php include('sidebar_navigation.php');?>

        
            <div class="page-inner">
                <div class="page-title">
                    <h3>Form Wizard</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Form Wizard</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div id="rootwizard">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <!-- <li role="presentation" class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user m-r-xs"></i>Personal Info</a></li> -->
                                            <li role="presentation"><a href="#tab2" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Product</a></li>
                                            <li role="presentation"><a href="#tab3" data-toggle="tab"><i class="fa fa-truck m-r-xs"></i>Payment</a></li>
                                            <li role="presentation"><a href="#tab4" data-toggle="tab"><i class="fa fa-check m-r-xs"></i>Finish</a></li>
                                        </ul>
                          
                                    
                                        <div class="progress progress-sm m-t-sm">
                                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            </div>
                                        </div>
                                        <form id="wizardForm">
                                            <div class="tab-content">
                                                <div class="tab-pane active fade in" id="tab1">
                                                    <div class="row m-b-lg">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <!-- <div class="form-group col-md-6">
                                                                    <label for="exampleInputName">First Name</label>
                                                                    <input type="text" class="form-control" name="exampleInputName" id="exampleInputName" placeholder="First Name">
                                                                </div>
                                                                <div class="form-group  col-md-6">
                                                                    <label for="exampleInputName2">Last Name</label>
                                                                    <input type="text" class="form-control col-md-6" name="exampleInputName2" id="exampleInputName2" placeholder="Last Name" >
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Email address</label>
                                                                    <input type="email" class="form-control" name="exampleInputEmail" id="exampleInputEmail" placeholder="Enter email" >
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputPassword1">Password</label>
                                                                    <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password" >
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputPassword2">Confirm Password</label>
                                                                    <input type="password" class="form-control" name="exampleInputPassword2" id="exampleInputPassword2" placeholder="Confirm Password">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-6">
                                                            <h3>Personal Info</h3>
                                                            <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab2">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <img src="assets/images/envato-logo.png" width="250" alt="">
                                                            <div class="m-t-md">
                                                                <address>
                                                                    <strong>Sneakervillain, Inc.</strong><br>
                                                                    12/2 Simmons St<br>
                                                                    South Yarra, VIC<br>
                                                                    <abbr title="Phone">P:</abbr> (+61) 431 829 801
                                                                </address>
                                                                <address>
                                                                    <strong>Full Name</strong><br>
                                                                    <a href="mailto:#">karamavisuals@gmail.com</a>
                                                                </address>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputProductName">Product Name</label>
                                                                <input type="text" class="form-control" name="exampleInputProductName" id="exampleInputProductName" placeholder="Product Name" >
                                                            </div>

                                                            <h4 class="no-m m-b-sm m-t-lg">Brand</h4>
                                                            <select class="js-example-data-array js-states form-control" tabindex="-1" style="display: none; width: 100%"></select>

                                                            <h4 class="no-m m-b-sm m-t-lg">Category</h4>
                                                            <select class="js-example-data-array js-states form-control" tabindex="-1" style="display: none; width: 100%"></select><br><br>

                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputProductId">Description</label>
                                                                <textarea cols="30" rows="2" name="description" class="form-control" value="" placeholder="Enter description name..." required></textarea>
                                                                <!-- <input type="text" class="form-control" name="exampleInputProductId" id="exampleInputProductId" placeholder="Product ID"> -->
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputQuantity">Quantity</label>
                                                                <input type="number" min="1" max="5" class="form-control" name="exampleInputQuantity" id="exampleInputQuantity" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputCard">Card Number</label>
                                                                <div class="row">
                                                                    <div class="col-md-8">
                                                                        <input type="text" class="form-control" name="exampleInputCard" id="exampleInputCard" placeholder="Card Number">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <input type="text" class="form-control col-md-4" name="exampleInputSecurity" id="exampleInputSecurity" placeholder="Security Code">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputHolder">Card Holders Name</label>
                                                                <input type="text" class="form-control" name="exampleInputHolder" id="exampleInputHolder" placeholder="Card Holders Name">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputExpiration">Expiration</label>
                                                                <input type="text" class="form-control date-picker" name="exampleInputExpiration" id="exampleInputExpiration" placeholder="Expiration">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label for="exampleInputCsv">CSV</label>
                                                                <input type="text" class="form-control" name="exampleInputCsv" id="exampleInputCsv" placeholder="CSV">
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="f-s-12">By pressing Next You will Agree to the Payment <a href="#">Terms & Conditions</a></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="tab4">
                                                    <h2 class="no-s">Thank You !</h2>
                                                    <div class="alert alert-info m-t-sm m-b-lg" role="alert">
                                                        Congratulations ! You got the last step.
                                                    </div>
                                                </div>
                                                <ul class="pager wizard">
                                                    <li class="previous"><a href="#" class="btn btn-default">Previous</a></li>
                                                    <li class="next"><a href="#" class="btn btn-default">Next</a></li>
                                                </ul>
                                            </div>
                                        </form>
                                    </div> <!-- Ends Here-->
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s">2019 &copy; Carl Karama.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/form-wizard.js"></script>

        <!-- Javascripts -->
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script src="assets/js/pages/form-select2.js"></script>
        
        
    </body>
</html>