<?php get_header(); ?>

<!-- Contenuti -->
	<div class="cd-main-content">
		<div id="main">
			<div id="container">
				<div id="colonna-sinistra">
<?php	 			if (have_posts()) : 
						while (have_posts()) : the_post(); 
?>							<div class="articolo" <?php post_class(); ?>>
								<div id="titolo">
									<h1><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
								</div>
								<div id="metatag">
									<img src="<?php print get_bloginfo('template_url'); ?>/immagini/user.jpg">
									<span><?php the_author(); ?></span>
									
									<img src="<?php print get_bloginfo('template_url'); ?>/immagini/calendar.jpg">
									<span><?php the_time('j F Y'); ?></span>
									
									<img src="<?php print get_bloginfo('template_url'); ?>/immagini/comment.jpg">
									<span><?php echo get_comment_count_for_posts();  ?></span>
								</div>
								<div id="divimmagine">
<?php	 								// controlla se il post ha un'immagine in evidenza assegnata
										if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										} 
?>								</div>
								<div id="testo-articolo">
									<div class="entry">
										<?php the_excerpt();?>				
									</div> 
								</div>
							</div>
<?php	 				endwhile; 
?>
		
						<!-- START NAVIGATION -->
						<div class="navigation">
							<div class="alignleft"><?php next_posts_link(__('&laquo; Precedenti')) ?></div>
							<div class="alignright"><?php previous_posts_link(__('Successivi &raquo;')) ?></div>
						</div>
						<!-- END NAVIGATION -->

<?php 				else: 
?>					<h2><?php _e('Non trovato'); ?></h2>
						<p class="center"><?php _e('Siamo spiacenti, quello che stavi cercando non è su questa pagina'); ?></p> 	
<?php 				endif; 
?>
				</div>
			
				<?php get_sidebar(); ?>
			
			</div>
		</div>
		
		<div class="footer">	
			<div class="copyright">
				<hr />
				<div class="logocopyright">
					<img src="/immagini/logocopyright.gif" alt="Software house puglia" title="Software house puglia"><span class="arkocopyright">Copyright &copy; 2010 <a href="http://www.arkosoft.it" alt="Software house puglia" title="Software house puglia">Arkosoft</a>. All rights reserved.</span>
				</div>
				<div class="piva">
					<b>ARKOSOFT - Software House</b><br />
					Nel Software e nel Web le tue Idee che diventano Realt&agrave;<br />
					SEDE Via Castello 54, 72026 San Pancrazio Salentino<br />
					Telefono: 0831/1815236<br />
					Fax: 0831/1815238<br />
						<a href="http://www.arkosoft.it" title="Software House Puglia">http://www.arkosoft.it</a>
					<br />
					P.IVA <b>02166630745</b>
				</div>
			</div> 	
		</div>
	</div> <!-- cd-main-content -->
	<div id="cd-lateral-nav">
		<ul class="cd-navigation cd-single-item-wrapper">
			<li><a href="#0">Home</a></li>
			<li><a href="#0">Acquista</a></li>
			<li><a href="#0">Galleria</a></li>
			<li><a class="current" href="#0">Blog</a></li>
			<li><a href="#0">Guida</a></li>
			<li><a href="#0">Supporto</a></li>
		</ul> <!-- cd-single-item-wrapper -->
	</div>
</div>
<div id="oscura" Onclick="javascript:chiudi();"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://www.softwarearredamento.com/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>	