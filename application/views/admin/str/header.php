
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="<?php echo base_url(); ?>admin/beranda">
                            <img width="160" src="<?php echo base_url('assets/dub_user/images/icon/login-admin.png')?>" alt="CoolAdmin" />
                        </a>
                    </div>
                    <div class="header__tool">
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 clearfix js-item-menu">
                                <div class="content">
                                    <button onclick="window.location='<?php echo base_url('admin/dub_konten/logout/');?>'" type="submit" class="btn btn-danger btn-sm">
										<i class="fa fa-power-off"></i>&nbsp;&nbsp;&nbsp;Keluar
									</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP -->

        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="p-t-30">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            <!-- MENU SIDEBAR-->
                            <aside class="menu-sidebar3 js-spe-sidebar">
                                <nav class="navbar-sidebar2 navbar-sidebar3">
                                    <ul class="list-unstyled navbar__list">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/beranda">
                                            	<i class="fas fa-home"></i>Beranda
                                        	</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/booking">
                                            	<i class="fas fa-book"></i>Booking
                                        	</a>
                                        </li>
                                        <li class="has-sub">
                                            <a class="js-arrow" href="#">
                                            	<i class="fas fa-suitcase"></i>Tour
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                <li>
		                                            <a href="<?php echo base_url(); ?>admin/tour">
		                                            	<i class="fas fa-plus"></i>Kategori
		                                        	</a>
                                                </li>
                                            </ul>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                <li>
		                                            <a href="<?php echo base_url(); ?>admin/paket">
		                                            	<i class="fas fa-plus"></i>Paket Tour
		                                        	</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="has-sub">
                                            <a class="js-arrow" href="#">
                                            	<i class="fas fa-bed"></i>Hotel
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                <li>
		                                            <a href="<?php echo base_url(); ?>admin/daerah">
		                                            	<i class="fas fa-plus"></i>Daerah
		                                        	</a>
                                                </li>
                                            </ul>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                <li>
		                                            <a href="<?php echo base_url(); ?>admin/hotel">
		                                            	<i class="fas fa-plus"></i>Hotel
		                                        	</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/blog">
                                            	<i class="fas fa-rss"></i>Blog
                                        	</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/galeri">
                                            	<i class="fas fa-picture-o"></i>Galeri
                                        	</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/slider">
                                            	<i class="fas fa-sliders"></i>Slider
                                        	</a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
