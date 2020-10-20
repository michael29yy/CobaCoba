<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="styles/shop_responsive.css">

</head>

<body>
<?php require_once'processp.php'?>
<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->


		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="index.php">Boolean Music</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="processp.php" class="header_search_form clearfix">
										<input type="search" name="carinama" required="required" class="header_search_input" placeholder="Search for products...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">All Categories</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<?php 
														$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
													    if (mysqli_connect_errno()){
													        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
													    }
													    $query = "SELECT * FROM kategori";
													    $result = mysqli_query($con,$query);

													    while ($row = $result->fetch_assoc()):
													?>	
													<li><a href="shop.php?kate=<?php echo $row['id_kategori']; ?>"><?php echo $row['nama']; ?></a></li>
													<?php endwhile;?>
												</ul>
											</div>
										</div>
										<button type="submit" name="cari" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">categories</div>
								</div>

								<ul class="cat_menu">
									<?php 
										$con = mysqli_connect('localhost', 'root', '', 'pbp_uts');
									    if (mysqli_connect_errno()){
									        die ("Could not connect to the database: <br />". mysqli_connect_error( ));
									    }
									    $query = "SELECT * FROM kategori";
									    $result = mysqli_query($con,$query);

									    while ($row = $result->fetch_assoc()):
									    	$query2 = "SELECT * FROM sub_kategori WHERE id_kategori = '".$row['id_kategori']."'";
									    	$result2 = mysqli_query($con,$query2);
									?>	
									<li class="hassubs">
										<a href="shop.php?kate=<?php echo $row['id_kategori']; ?>"><?php echo $row['nama']; ?><i class="fas fa-chevron-right ml-auto"></i></a>
										<ul>
											<?php while ($row2 = $result2->fetch_assoc()): ?>
											<li><a href="shop.php?sk=<?php echo $row2['idsub_kategori']; ?>"><?php echo $row2['nama']; ?><i class="fas fa-chevron-right"></i></a></li>
											 <?php endwhile;?>
										</ul>
									</li>
									<?php endwhile; ?>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="shop.php">Home<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a href="#">Super Deals<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Featured Brands<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li>
												<a href="#">Menu Item<i class="fas fa-chevron-down"></i></a>
												<ul>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
													<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
												</ul>
											</li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Menu Item<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Pages<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="product.html">Product<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="blog_single.html">Blog Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="regular.html">Regular Post<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="contact.html">Contact<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item has-children">
									<a href="#">Language<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item">
									<a href="#">Home<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Super Deals<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Super Deals<i class="fa fa-angle-down"></i></a></li>
										<li class="page_menu_item has-children">
											<a href="#">Menu Item<i class="fa fa-angle-down"></i></a>
											<ul class="page_menu_selection">
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
												<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
											</ul>
										</li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Featured Brands<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Trending Styles<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>+38 068 005 3570</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Alat Musik</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<?php 
						$query = "SELECT * FROM kategori";
						$result = mysqli_query($con,$query);
					?>
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>					
							<ul class="sidebar_categories">
								<li><a href="shop.php">All Product</a></li>
								<?php while ($row = $result->fetch_assoc()): ?>
								<li><a href="shop.php?kate=<?php echo $row['id_kategori']; ?> "><?php echo $row['nama']; ?></a></li>
								<?php endwhile; ?>
							</ul>		
						</div>
					</div>
						
				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<?php if (isset($_GET['kate'])): 
								$id= $_GET['kate'];
								$query = "SELECT * FROM barang WHERE kategori = $id";
								$result = mysqli_query($con,$query);
								$cek = mysqli_num_rows($result);
							?>
							<div class="shop_product_count"><span><?php echo $cek ?></span> products found</div>
							<?php else: ?>
							<?php if (isset($_GET['sk'])):
								$id = $_GET['sk'];
								$query = "SELECT * FROM barang WHERE sub_kategori = $id";
								$result = mysqli_query($con,$query);
								$cek = mysqli_num_rows($result);
							?>
							<div class="shop_product_count"><span><?php echo $cek ?></span> products found</div>
							<?php else: ?>
							<?php if (isset($_GET['nmb'])):
								$nama = $_GET['nmb'];
								$query = "SELECT * FROM barang WHERE nama LIKE '%".$nama."%'";
								$result = mysqli_query($con,$query);
								$cek = mysqli_num_rows($result);
							?>
							<div class="shop_product_count"><span><?php echo $cek ?></span> products found</div>
							<?php else:
								$query = "SELECT * FROM barang";
								$result = mysqli_query($con,$query);
								$cek = mysqli_num_rows($result);
								?>
							<div class="shop_product_count"><span><?php echo $cek ?></span> products found</div>
							<?php endif; ?>
							<?php endif;?>
							<?php endif;?>
							<!-- SHOP SORTING -->
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<!-- Product Item -->
							<?php if (isset($_GET['kate'])): 
								$id= $_GET['kate'];
								$query = "SELECT * FROM barang WHERE kategori = $id";
								$result = mysqli_query($con,$query);
								while($row = $result->fetch_assoc()):
							?>
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src= "BS3/PBP/<?php echo $row['gambar'] ?>" alt="gambar"></div>
								<div class="product_content">
									<div class="product_price" >Rp.<?php echo $row['harga']; ?></div>
									<div class="product_name"><div><a href="product.php?idb=<?php echo $row['id_barang']?>" tabindex="0"><?php echo $row['nama'] ?></a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>
							<?php endwhile; ?>
							<?php else:?>
							<?php if (isset($_GET['sk'])): 
								$id= $_GET['sk'];
								$query = "SELECT * FROM barang WHERE sub_kategori = $id";
								$result = mysqli_query($con,$query);
								while($row = $result->fetch_assoc()):
							?>
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src= "BS3/PBP/<?php echo $row['gambar'] ?>" alt="gambar"></div>
								<div class="product_content">
									<div class="product_price" >Rp.<?php echo $row['harga']; ?></div>
									<div class="product_name"><div><a href="product.php?idb=<?php echo $row['id_barang']?>" tabindex="0"><?php echo $row['nama'] ?></a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>
							<?php endwhile; ?>
							<?php else:?>
							<?php if (isset($_GET['nmb'])):	
								$nama = $_GET['nmb'];
								$query = "SELECT * FROM barang WHERE nama LIKE '%".$nama."%'";
								$result = mysqli_query($con,$query);
								while($row = $result->fetch_assoc()):
							?>
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src= "BS3/PBP/<?php echo $row['gambar'] ?>" alt=""></div>
								<div class="product_content">
									<div class="product_price">Rp.<?php echo $row['harga']; ?></div>
									<div class="product_name"><div><a href="product.php?idb=<?php echo $row['id_barang']?>"><?php echo $row['nama'] ?></a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>
							<?php endwhile;?>
							<?php else:
								$query = "SELECT * FROM barang";
								$result = mysqli_query($con,$query);
								while($row = $result->fetch_assoc()): 
							?>
							<div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src= "BS3/PBP/<?php echo $row['gambar'] ?>" alt=""></div>
								<div class="product_content">
									<div class="product_price">Rp.<?php echo $row['harga']; ?></div>
									<div class="product_name"><div><a href="product.php?idb=<?php echo $row['id_barang']?>"><?php echo $row['nama'] ?></a></div></div>
								</div>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>
							<?php endwhile; ?>
							<?php endif; ?>
							<?php endif;?>
							<?php endif;?>
						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script><a href=index.php>Boolean Music</a>, Asik-asik JOSS!!!
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/shop_custom.js"></script>
</body>

</html>