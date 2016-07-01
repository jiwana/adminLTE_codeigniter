<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo  $title ?> | Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>AdminLTE/css/AdminLTE.min.css"  />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>AdminLTE/css/skins/_all-skins.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>select2/select2.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>bootstrap-fileinput/css/fileinput.min.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo plugin_url ?>datatables/dataTables.bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo css_url ?>admin.css" />
        <link rel="shortcut icon" href="<?php echo image_url ?>forWebs/favicon.ico">
        <base href=<?php echo  base_url() ?>></base>
        <style type="text/css">
            .alert{
                margin:8px 0px 0px 0px;
                padding: 10px 15px;
                font-size: 15px;
            }
            .no-padding-left{
                padding-left:0px;
            }
            .no-padding-right{
                padding-right:0px;
            }
            .no-padding{
                padding:0px;
            }
            .selecPlac{
                display: none;
            }
            .action .tambah{
                width: 110px;
                float: left;
            }
            .action .menu-action{
                float: left;
                width: 235px;
                padding-left: 40px;
            }
            .action .menu-action .menu-select{
                float: left;
                width: 140px;
                margin-right: 8px;
            }
            .action .menu-action .menu-apply{
                float: left;
            }
            .sidebar-menu > li > a {
                padding: 12px 13px 10px 15px;
            }

            .sidebar-menu, .main-sidebar .user-panel,
            .sidebar-menu > li.header {
                white-space: normal !important;
            }

            #datatbl img{
                width: 100px;
                height: 75px;
                border-radius: 5px;
            }

            @media(max-width: 399px){
                .action .tambah{
                    float:none;
                    width: 100%;
                    margin-bottom: 15px;
                }
                .action .menu-action{
                    float: none;
                    padding: 0px;
                    width: 100%;
                }
                .action .menu-action .menu-select{
                    margin: 0px 0px 10px;
                    float: none;
                    width: 100%;
                }
                .action .menu-action .menu-apply{
                    width: 100%;
                    float:none;
                }
            }
        </style>
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <a href="<?php echo site_url('dashboard') ?>" class="logo">
                    <span class="logo-mini"><b>A</b>L</span>
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src='<?php echo isset($dataUser->photo) ? image_user.str_replace("-x","-x25", $dataUser->photo) : default_user ?>' class="user-image" alt="User Image"/>
                                    <span class="hidden-xs"><?php echo $dataUser->nama ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src='<?php echo isset($dataUser->photo) ? image_user.str_replace("-x","-xOri", $dataUser->photo) : default_user ?>' class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $dataUser->nama ?>
                                            <small>Admin</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo  site_url('users') ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo  site_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <?php $this->load->view('menu')  ?>
                </section>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        <?php echo  $title ?>
                        <small><?php echo  empty($desc) ? "" : $desc  ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><?php echo $parentTitle ?></li>
                        <li class="active"><?php echo  $title ?></li>
                    </ol>
                    <?php message() ?>
                </section>