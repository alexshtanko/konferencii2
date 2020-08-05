<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package konferencii2
 */

?>

	<footer id="colophon" class="site-footer footer">
	<div class="footer-top">
			<form action="#" method="POST">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="footer-top-title">Не забудьте подписаться на рассылку</div>
						</div>
						<div class="col-lg-3">
							<input class="inpt-2" type="text" name="" placeholder="Все разделы">
						</div>
						<div class="col-lg-3">
							<input class="inpt-2" type="text" name="" placeholder="Ваш e-mail">
						</div>
						<div class="col-lg-2">
							<input class="btn-subscribe" type="submit" name="">
						</div>
					</div>
				</div>

			</form>
			
		</div>
		<div class="footer-middle">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<h2>Open Directory scientific conferences, exhibitions and seminars</h2>
						<div class="footer-counters">
							<ul>
								<li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/counter-1.jpg" alt=""></a></li>
								<li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/counter-2.jpg" alt=""></a></li>
								<!-- <li><a href="#"><img src="img/counter-1.jpg"></a></li>
								<li><a href="#"><img src="img/counter-2.jpg"></a></li> -->
							</ul>
						</div>
						<div class="footer-copyright">
							<p>© konferencii.ru 2007—2020</p>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="footer-nav">
							<?php
								wp_nav_menu(
									array(
										'menu'        => 'footer nav',
									)
								);
							?>
						</div>

						<div class="footer-sn">
							<ul>
								<li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-vk.png" alt="VKontakte"></a></li>
								<li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-f.png" alt="Facebook"></a></li>
								<li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-t.png" alt="Twitter"></a></li>
								<li><a href="#" target="_blank" rel="nofollow"><img src="<?php echo bloginfo('template_url'); ?>/img/sn-o.png" alt="Одноклассники"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--footer-middle end here-->
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
