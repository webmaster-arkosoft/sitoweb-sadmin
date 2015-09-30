<?php get_header(); ?>
		
<!-- Contenuti -->
	<div class="cd-main-content" id="cd-main-content">
		<div id="main">
			<div id="container">
				<div id="colonna-sinistrasing">
<?php	 			if (have_posts()) :
						while (have_posts()) : the_post(); 
?>							<div class="articolo" <?php post_class(); ?>>
								<div id="titolo">
									<h1><?php the_title(); ?></h1>
								</div>
								<div id="metatag">
									<img src="<?php print get_bloginfo('template_url'); ?>/immagini/user.jpg">
									<span><?php the_author(); ?></span>
									
									<img src="<?php print get_bloginfo('template_url'); ?>/immagini/calendar.jpg">
									<span><?php the_time('j F Y'); ?></span>
									
									<img src="<?php print get_bloginfo('template_url'); ?>/immagini/comment.jpg">
									<span><?php echo get_comment_count_for_posts();  ?></span>
								</div>
								<div id="testo-articolo">
									<div class="entry">
										<?php the_content(__('[Continua a leggere...]')); ?>
									</div> 
								</div>
							</div>						
						
					<?php endwhile; ?>
					<!-- END LOOP -->

				<?php else: ?>
					<h2><?php _e('Non trovato'); ?></h2>
					<p class="center"><?php _e('Siamo spiacenti, quello che stavi cercando non è su questa pagina'); ?></p> 	
				<?php endif; ?>
					
					<?php edit_post_link( __( 'Modifica articolo.', 'cc' ), '<p class="edit-link">', '</p>'); ?>

					<!-- instead of comment_form() we use comments_template(). If you want to fall back to wp, change this function call ;-) -->
					<?php comments_template(); ?>
				</div>
			</div>
			
			<?php get_sidebar(); ?>
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
			<li><a href="http://www.softwarearredamento.com">Home</a></li>
			<li><a href="http://www.softwarearredamento.com/acquista.html">Acquista</a></li>
			<li><a href="http://www.softwarearredamento.com/galleria.html">Galleria</a></li>
			<li><a class="current" href="http://www.softwarearredamento.com/blog/">Blog</a></li>
			<li><a href="http://www.softwarearredamento.com/guida/index.html">Guida</a></li>
			<li><a href="http://ticket.arkosoft.it">Supporto</a></li>
		</ul> <!-- cd-single-item-wrapper -->
	</div>
	<div id="oscura" Onclick="javascript:chiudi();"></div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="http://www.softwarearredamento.com/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>	