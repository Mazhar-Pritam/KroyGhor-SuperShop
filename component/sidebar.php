   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                        <a href="index.html">
                           <img src="<?php echo $base_url; ?>assets/images/loogo.png" alt="Theme-Logo" style="width:238px; height:57px;" />
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>

                    <div class="navbar-container">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-text search-close"><i class="feather icon-x"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-text search-btn"><i class="feather icon-search"></i></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="/assets/images/avatar-4.jpg" class="img-radius"
                                            alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="user-profile.html">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= $base_url ?>logout.php">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>       
           <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend"
                                            id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="d-flex chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="d-flex chat-messages">
                    <div class="flex-shrink-0">
                        <a class="flex-shrink-0 me-3 photo-table" href="#!">
                            <img class="rounded img-radius img-radius m-t-5" src="/assets/images/avatar-3.jpg"
                                alt="Generic placeholder image">
                        </a>
                    </div>
                    <div class="flex-grow-1 chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex chat-messages">
                    <div class="flex-grow-1 chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="flex-shrink-0 ms-3 photo-table">
                            <a href="#!">
                                <img class="rounded img-radius img-radius m-t-5"
                                    src=" /assets/images/avatar-4.jpg" alt="Generic placeholder image">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="<?php echo $base_url; ?>dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo $base_url; ?>customer/list.php">
                                        <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                                        <span class="pcoded-mtext">Customer</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu" dropdown-icon="style1" subitem-icon="style1">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                                        <span class="pcoded-mtext">Product</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="<?php echo $base_url; ?>product/list.php">
                                                <span class="pcoded-mtext">Product</span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="<?php echo $base_url; ?>categories/list.php">
                                                <span class="pcoded-mtext">Categories</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="<?php echo $base_url; ?>supplier/list.php">
                                        <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                                        <span class="pcoded-mtext">Supplier</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo $base_url; ?>purchase/list.php">
                                        <span class="pcoded-micon"><i class="feather icon-briefcase"></i></span>
                                        <span class="pcoded-mtext">Purchase</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo $base_url; ?>warehouse/list.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Warehouse</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="<?php echo $base_url; ?>users/list.php">
                                        <span class="pcoded-micon"><i class="feather icon-user"></i></span>
                                        <span class="pcoded-mtext">Users</span>
                                    </a>
                                </li>
                            </ul>
                    </nav>