<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Lombok Travel</title>

	<!-- Favicon -->
	<link rel="icon" href="<?php echo base_url('assets/images/favicon.png')?>" type="image/x-icon" />
	<!-- Bootstrap CSS -->
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<!-- Animate CSS -->
	<link href="<?php echo base_url('assets/vendors/animate/animate.css')?>" rel="stylesheet">
	<!-- Icon CSS-->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css')?>">
	<!-- Camera Slider -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendors/camera-slider/camera.css')?>">
	<!-- Owlcarousel CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendors/owl_carousel/owl.carousel.css')?>" media="all">

	<!--Theme Styles CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css')?>" media="all" />

  	<style>
	  	.carousel-inner img {
	     	width: 100%;
	      	height: 400px !important;
  		}
  		.carousel-indicators li {
		    border: 1px solid #f6b60b;
		}
  		.carousel-indicators .active {
		    background-color: #f6b60b;
		}
		@media screen and (max-width: 600px) {
		  	.carousel-inner img {
		     	width: 100%;
		      	height: 200px !important;
	  		}
		}
		.imgBlog {
			width: -webkit-fill-available;
		    border: 4px solid #fff;
		    border-radius: 4px;
		    box-shadow: 0 1px 4px rgba(0,0,0,.2);
		    -webkit-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		    -moz-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		    -o-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		    box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		}
		.galeriImg {
			background-size: cover;
			background-position: center;
			min-height: 180px;
		    border: 4px solid #fff;
		    border-radius: 4px;
		    box-shadow: 0 1px 4px rgba(0,0,0,.2);
		    -webkit-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		    -moz-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		    -o-box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
		    box-shadow: '' 0 1px 4px rgba(0, 0, 0, 0.2);
  			transition: transform .2s; /* Animation */
		}
		.galeriImg:hover {
			transform: scale(1.05);
		}
		#modalGaleri {
			z-index:15000;
		}
		.modal-backdrop.in {
			z-index: 14999;
		    opacity: 0.7;
		}
		#blog_area #blog_area_row #blog_area_content #blog_area_content_detail p a {
			font-weight: 700;
			color: #222222;
		}
		#blog_area #blog_area_row #blog_area_content #blog_area_content_detail p a:hover, #blog_area #blog_area_row #blog_area_content #blog_area_content_detail p a:focus {
			color: #f6b60b;
		}
  	</style>
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Preloader -->
	<div class="preloader"></div>
