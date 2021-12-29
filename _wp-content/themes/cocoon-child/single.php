        <?php get_header(); ?>

		<!-- main -->
		<main>
			<!-- .p-page__fv -->
			<section class="p-page--single__fv">
				<div class="c-inner">
					<h1 class="p-page__fvTitle js-loading">
						<span id="js-fvTitle1"></span>
						<span id="js-fvTitle2"></span>
					</h1>
				</div>
			</section>
			<!-- /.p-page__fv -->

			<!-- .p-page__content -->
			<section class="p-page--single__content c-section" id="content">
				<div class="c-section__inner">
					<h1 class="p-page--single__title"><?php the_title(); ?></h1>
					<!-- single.php -->
					<?php if (have_posts()): ?>
						<?php while (have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
					<?php endif; ?>
				</div>
			</section>
			<!-- /.p-page__content -->
		</main>
		<!-- /main -->

		<?php get_footer(); ?>
