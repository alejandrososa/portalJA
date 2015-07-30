<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <!-- BEGIN .boxed.active -->
	<div class="boxed">
        <?php
            /*NavBar::begin([
                'brandLabel' => 'JA',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();*/
        ?>
        <!-- BEGIN .header -->
			<header class="header">
				<!-- 
				<nav class="top-menu">
					<div class="wrapper">
						<ul class="left load-responsive" rel="Top Menu">
							<li><a href="index.html"><i class="fa fa-home"></i></a></li>
							<li><a href="blog.html"><span>Blog page</span></a>
								<ul>
									<li><a href="blog2.html">Blog page #2</a></li>
									<li><a href="blog3.html">Blog page #3</a></li>
								</ul>
							</li>
							<li><a href="features.html">Features</a></li>
							<li><a href="shortcodes.html">Shortcodes</a></li>
							<li><a href="category.html">Category</a></li>
						</ul>
						<div class="clear-float"></div>
					</div>
				</nav>
				 -->
				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="header-flex">
						<div class="header-flex-box">
							<!-- <h1><a href="index.html">Solidus</a></h1> -->
							<a href="index.html"><img src="/images/logo.png" alt="" /></a>
						</div>
						<!-- <div class="header-flex-box banner">
							<a href="#" target="_blank"><img src="/images/no-banner-728x90.jpg" alt="" /></a>
						</div> -->
						<div class="header-flex-box latest-news-top">
							<div class="items-wrapper">
								<a href="post.html" class="item">
									<img src="/images/photos/image-15.jpg" alt="" />
									<strong>Ea omnium incorrupte eos, sea wisi modus semper at</strong>
								</a>
								<a href="post.html" class="item">
									<img src="/images/photos/image-16.jpg" alt="" />
									<strong>Ea omnium incorrupte eos, sea wisi modus semper at</strong>
								</a>
								<a href="post.html" class="item">
									<img src="/images/photos/image-17.jpg" alt="" />
									<strong>Ea omnium incorrupte eos, sea wisi modus semper at</strong>
								</a>
								<a href="post.html" class="item">
									<img src="/images/photos/image-15.jpg" alt="" />
									<strong>Ea omnium incorrupte eos, sea wisi modus semper at</strong>
								</a>
							</div>
						</div>
					</div>

					<div class="header-center" style="display:none;">
						<!-- <h1><a href="index.html">Solidus</a></h1> -->
						<a href="index.html"><img src="/images/logo-big.png" alt="" /></a>
					</div>
					
					
					<!-- <nav id="main-menu"> -->
					<nav id="main-menu" class="willfix main-menu-dark">
						<!-- BEGIN .wrapper -->
						<div class="wrapper">
							<div class="right">
								<div class="menu-icon">
									<a href="#"><i class="fa fa-user"></i></a>
								</div>
								<div class="menu-icon">
									<a href="#"><i class="fa fa-shopping-cart"></i></a>
									<div class="content widget">


										<div class="widget_shopping_cart_content">

											<!-- BEGIN .cart_list -->
											<ul class="cart_list product_list_widget">

												<li>
													<a href="#"><img src="/images/photos/image-36.jpg" class="attachment-shop_thumbnail wp-post-image" alt="">Woo Album #4</a>
													<span class="quantity">1 × <span class="amount">£9.00</span></span>
												</li>
												<li>
													<a href="#"><img src="/images/photos/image-37.jpg" class="attachment-shop_thumbnail wp-post-image" alt="hoodie_5_front">Ninja Silhouette</a>
													<span class="quantity">1 × <span class="amount">£35.00</span></span>
												</li>

											<!-- END .cart_list -->
											</ul>

											<p class="total"><strong>Subtotal:</strong> <span class="amount">£44.00</span></p>

											<p class="buttons">
												<a href="#" class="button wc-forward">View Cart</a>
												<a href="#" class="button checkout wc-forward">Checkout</a>
											</p>

										</div>


									</div>
								</div>
								<div class="menu-icon">
									<a href="#"><i class="fa fa-search"></i></a>
									<div class="content content-search">
										<form action="#">
											<input type="search" class="head-search-input" value="" placeholder="Search things.." required="">
											<input type="submit" class="head-search-button" value="Search">
										</form>
									</div>
								</div>
							</div>
							<ul class="load-responsive" rel="Main Menu">
								<li class="ot-showmenu"><a href="#">Menu<span class="cmn-toggle-switch cmn-toggle-switch__htx active"><span>toggle menu</span></span></a></li>
								<li><a href="index.html" style="border-bottom: 2px solid #45b29d;"><span>Home<span class="m-d-arrow"></span></span></a>
									<ul class="sub-menu">
										<li><a href="blog.html">Blog page</a></li>
										<li><a href="category.html">Category page</a></li>
										<li><a href="post.html"><span>Single post page</span></a>
											<ul class="sub-menu">
												<li><a href="post-no-photo.html">Post with no photo</a></li>
												<li><a href="post-no-comments.html">Post with no comments</a></li>
												<li><a href="post-left.html">Post Sidebar on left</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li><a href="features.html" style="border-bottom: 2px solid #efc94c;"><span>Features<span class="m-d-arrow"></span></span></a>
									<ul>
										<li><a href="shortcodes.html">Shortcodes</a></li>
										<li><a href="error-404.html">Error 404 page</a></li>
										<li><a href="full-width.html">Full width page</a></li>
										<li><a href="shop.html">Shop Page</a></li>
									</ul>
								</li>
								<li><a href="shortcodes.html" style="border-bottom: 2px solid #589fc8;">Shortcodes</a></li>
								<li class="has-ot-mega-menu"><a href="#" style="border-bottom: 2px solid #e27a3f;"><span>Widget Menu<span class="m-d-arrow"></span></span></a>
									<ul class="ot-mega-menu">
										<li>
											<div class="menu-widgets">
												<div class="widget">
													<div class="title-block">
														<h2>ABOUT SOLIDUS</h2>
													</div>
													<div class="ot-about-widget">
														<p>Deserunt posuere pellentesque porta ridiculus fugiat. Tempus ad per consectetur maecenas penatibus. Aliquip amet phasellus nam sociosqu.</p>
														<p>Deserunt posuere pellentesque porta ridiculus fugiat. Tempus ad per consectetur maecenas penatibus. Aliquip amet phasellus nam sociosqu.</p>
													</div>
												</div>

												<!-- BEGIN .widget -->
												<div class="widget">
													<div class="title-block">
														<h2>Latest News</h2>
													</div>
													<div class="article-block without-images">

														<div class="item">
															<div class="item-content">
																<a href="#" style="background: #0076a3;" class="item-content-category left">Fashion</a>
																<span class="article-meta left">
																	<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
																	<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
																</span>
																<div class="clear-float"></div>
																<h4><a href="post.html">Solidus - best selling wordpress theme</a></h4>
																<p>His at everti appetere, vitae utamur eum in, ea ubique vidisse duo.</p>
															</div>
														</div>

														<div class="item">
															<div class="item-content">
																<a href="#" style="background: #00a651;" class="item-content-category left">Fashion</a>
																<span class="article-meta left">
																	<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
																	<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
																</span>
																<div class="clear-float"></div>
																<h4><a href="post.html">Solidus - best selling wordpress theme</a></h4>
																<p>His at everti appetere, vitae utamur eum in, ea ubique vidisse duo.</p>
															</div>
														</div>

													</div>
												<!-- END .widget -->
												</div>

												<div class="widget">
													<div class="title-block">
														<h2>Tag Cloud</h2>
													</div>
													<div class="tagcloud">
														<a href="blog.html">Comprehensam</a><a href="blog.html">Consequuntur</a><a href="blog.html">Denique</a><a href="blog.html">Elaboraret scribentur</a><a href="blog.html">Et elaboraret</a><a href="blog.html">Fierent inimicus</a><a href="blog.html">Incorrupte</a><a href="blog.html">Mediocritatem</a><a href="blog.html">Nostrud accusam</a><a href="blog.html">Tation luptatum</a><a href="blog.html">Voluptatum et</a>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li><a href="photo-gallery.html"><span>Gallery<span class="m-d-arrow"></span></span></a>
									<ul>
										<li><a href="photo-gallery-single.html">Photo gallery single</a></li>
										<li><a href="photo-gallery-lightbox.html">Photo gallery lightbox</a></li>
									</ul>
								</li>
								<li><a href="contact-us.html" style="border-bottom: 2px solid #df5a49;">Contacts</a></li>
							</ul>
						<!-- END .wrapper -->
						</div>
					</nav>
				<!-- END .wrapper -->
				</div>

				<div class="under-menu">
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
						<ul class="load-responsive" rel="Secondary Menu">
							<li><a href="blog.html">Blog page</a></li>
							<li><a href="blog2.html">Blog page #2</a></li>
							<li><a href="blog3.html">Blog page #3</a></li>
							<li><a href="features.html">Features</a></li>
							<li><a href="shortcodes.html">Shortcodes</a></li>
							<li><a href="category.html">Category</a></li>
						</ul>
					<!-- END .wrapper -->
					</div>
				</div>
				
			<!-- END .header -->
			</header>
        
            
        <!-- BEGIN .content -->
		<section class="content">

			<!-- BEGIN .wrapper -->
			<div class="wrapper">
			     
			     <!-- BEGIN .main-content -->
				 <div class="main-content-area">
        
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                    </div>                
                <!-- END .wrapper -->
				</div>
				
		<!-- BEGIN .content -->
		</section>
		
		
		<!-- BEGIN .footer -->
			<footer class="footer">

				<!-- BEGIN .wrapper -->
				<div class="wrapper">

					<div class="footer-menu">
						<a href="#top" class="right">Back to top <i class="fa fa-chevron-up"></i></a>
						<ul>
							<li><a href="#" style="border-bottom: 2px solid #43b3bd;">Business</a></li>
							<li><a href="#" style="border-bottom: 2px solid #9e005d;">Fashion</a></li>
							<li><a href="#" style="border-bottom: 2px solid #575cc0;">Gadgets</a></li>
							<li><a href="#" style="border-bottom: 2px solid #007236;">Design</a></li>
							<li><a href="#" style="border-bottom: 2px solid #aba000;">Computers</a></li>
						</ul>
					</div>

					<!-- BEGIN .footer-widgets -->
					<div class="footer-widgets">

						<div class="footer-widget-wrapper">

							<!-- BEGIN .footer-widget-left -->
							<div class="footer-widget-left">

								<div class="widget">
									<div class="title-block">
										<h2>ABOUT SOLIDUS</h2>
									</div>
									<div class="ot-about-widget">
										<p>Solidus magazine was set up in 1991 and is the leading magazine of contemporary art and culture. frieze includes essays, reviews and columns by today’s most forward-thinking writers, artists and curators.</p>
										
										<ul class="list-group">
											<li><i class="fa fa-location-arrow fa-fw"></i>122 Baker Street, Marylebone London, W1U 6TX</li>
											<li><i class="fa fa-phone fa-fw"></i>0870 241 3300</li>
											<li><i class="fa fa-envelope fa-fw"></i>support@theme.com</li>
										</ul>
										<br/>
										<br/>
										<img src="/images/logo.png" alt="" />
									</div>
								</div>

							<!-- END .footer-widget-left -->
							</div>

							<!-- BEGIN .footer-widget-middle -->
							<div class="footer-widget-middle">

								<!-- BEGIN .widget -->
								<div class="widget">
									<div class="title-block">
										<h2>Reviews</h2>
									</div>
									<div class="article-block">
										<div class="item">
											<div class="item-header">
												<a href="post.html" class="image-hover"><img src="/images/photos/image-2.jpg" alt="" /></a>
											</div>
											<div class="item-content">
												<span class="article-meta">
													<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
													<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
												</span>
												<h4><a href="post.html">Quadrum - multipurpose news &amp; magazine theme</a></h4>
												<span class="item-stars" style="color: #f05c5c;"><span class="stars-inner" style="width: 90%;"></span></span>
											</div>
										</div>
										<div class="item">
											<div class="item-header">
												<a href="post.html" class="image-hover"><img src="/images/photos/image-3.jpg" alt="" /></a>
											</div>
											<div class="item-content">
												<span class="article-meta">
													<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
													<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
												</span>
												<h4><a href="post.html">Quadrum - multipurpose news &amp; magazine theme</a></h4>
												<span class="item-stars" style="color: #f05c5c;"><span class="stars-inner" style="width: 90%;"></span></span>
											</div>
										</div>
										<div class="item">
											<div class="item-header">
												<a href="post.html" class="image-hover"><img src="/images/photos/image-4.jpg" alt="" /></a>
											</div>
											<div class="item-content">
												<span class="article-meta">
													<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
													<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
												</span>
												<h4><a href="post.html">Quadrum - multipurpose news &amp; magazine theme</a></h4>
												<span class="item-stars" style="color: #f05c5c;"><span class="stars-inner" style="width: 90%;"></span></span>
											</div>
										</div>
										<a href="blog.html" class="item-button">Load more ...</a>
									</div>
								<!-- END .widget -->
								</div>

							<!-- END .footer-widget-middle -->
							</div>

							<!-- BEGIN .footer-widget-right -->
							<div class="footer-widget-right">

								<!-- BEGIN .widget -->
								<div class="widget">
									<div class="title-block">
										<h2>Latest News</h2>
									</div>
									<div class="article-block without-images">

										<div class="item">
											<div class="item-content">
												<a href="#" style="background: #0076a3;" class="item-content-category left">Fashion</a>
												<span class="article-meta left">
													<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
													<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
												</span>
												<div class="clear-float"></div>
												<h4><a href="post.html">Solidus - best selling wordpress theme</a></h4>
												<p>His at everti appetere, vitae utamur eum in, ea ubique vidisse duo.</p>
											</div>
										</div>

										<div class="item">
											<div class="item-content">
												<a href="#" style="background: #9e2929;" class="item-content-category left">Cars</a>
												<span class="article-meta left">
													<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
													<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
												</span>
												<div class="clear-float"></div>
												<h4><a href="post.html">Solidus - best selling wordpress theme</a></h4>
												<p>His at everti appetere, vitae utamur eum in, ea ubique vidisse duo.</p>
											</div>
										</div>

										<div class="item">
											<div class="item-content">
												<a href="#" style="background: #00a651;" class="item-content-category left">Fashion</a>
												<span class="article-meta left">
													<a href="blog.html" class="meta-date"><i class="fa fa-clock-o"></i>21 nov 21:34</a>
													<a href="post.html#comments" class="meta-comments"><i class="fa fa-comment"></i>34</a>
												</span>
												<div class="clear-float"></div>
												<h4><a href="post.html">Solidus - best selling wordpress theme</a></h4>
												<p>His at everti appetere, vitae utamur eum in, ea ubique vidisse duo.</p>
											</div>
										</div>

									</div>
								<!-- END .widget -->
								</div>


							<!-- END .footer-widget-right -->
							</div>

							<!-- BEGIN .footer-widget-right -->
							<div class="footer-widget-right">

								<div class="widget">
									<div class="title-block">
										<h2>Tags</h2>
									</div>
									<div class="tagcloud">
										<a href="blog.html">Gadgets</a><a href="blog.html">Cars</a><a href="blog.html">Fashion</a><a href="blog.html">Cars</a><a href="blog.html">Computers</a><a href="blog.html">Trends</a><a href="blog.html">Gadgets</a><a href="blog.html">Cars</a><a href="blog.html">Fashion</a><a href="blog.html">Cars</a><a href="blog.html">Computers</a><a href="blog.html">Trends</a>
									</div>
								</div>

								<div class="widget">
									<div class="title-block">
										<h2>Categories</h2>
									</div>
									<div class="w-category-block">
										<ul>
											<li><a href="#">Style hunter</a><a href="#" class="right">42</a></li>
											<li><a href="#">Chicago show</a><a href="#" class="right">12</a></li>
											<li><a href="#">Fashion week</a><a href="#" class="right">17</a></li>
											<li><a href="#">Cosmopolitan</a><a href="#" class="right">34</a></li>
											<li><a href="#">Daily steet chic</a><a href="#" class="right">78</a></li>
										</ul>
									</div>
								</div>

							<!-- END .footer-widget-right -->
							</div>

						</div>

					<!-- END .footer-widgets -->
					</div>
						
				<!-- END .wrapper -->
				</div>

				<!-- BEGIN .footer-copy -->
				<div class="footer-copy">
				
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
						
						<ul>
							<li><a href="index.html">Site map</a></li>
							<li><a href="#">Contact</a></li>
							<li><a href="#">Newsletter sign up</a></li>
							<li><a href="#">Press Center</a></li>
							<li><a href="#">Customer Service</a></li>
							<li><a href="#">Advertising</a></li>
						</ul>

						<p><?= date('Y') ?> THE MATERIAL ON THIS SITE MAY NOT BE REPRODUCED, DISTRIBUTED, TRANSMITTED, CACHED OR OTHERWISE USED,<br>EXCEPT WITH THE PRIOR WRITTEN PERMISSION OF SOLIDUS DIGITAL.</p>
						
					<!-- END .wrapper -->
					</div>

				<!-- END .footer-copy -->
				</div>
				
			<!-- END .footer -->
			</footer>
   
    
    <!-- END .boxed -->
    </div>

    <?php $this->endBody() ?>
    <script>
			jQuery(document).ready(function() {
				jQuery(".ot-slider").owlCarousel({
					items : 1,
					autoplay : true,
					nav : true,
					lazyload : false,
					responsive : true,
					dots : true,
					margin : 15
				});

				jQuery(".big-pic-random .slider-items").owlCarousel({
					items : 1,
					autoplay : false,
					nav : true,
					lazyload : false,
					dots : false,
					margin : 15
				});

				jQuery(".related-articles-inherit").owlCarousel({
					items : 4,
					autoplay : false,
					nav : true,
					lazyload : false,
					dots : true,
					margin : 15,
					responsive:{
						0:{
							items: 1,
							nav: true
						},
						400:{
							items: 2,
							nav: false
						},
						700:{
							items: 4,
							nav: true,
							loop: false
						}
					}
				});
			});
		</script>
</body>
</html>
<?php $this->endPage() ?>
