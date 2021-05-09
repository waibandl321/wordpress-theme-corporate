<?php
/*
Template Name: 固定ページ用
*/
?>
<?php get_header(); ?>
<!-- 固定ページのコンテンツはここから -->
<main>
	<div class="fixed-page">
		<!-- メインビジュアル アイキャッチ画像とページタイトルの読み込み -->
		<?php if( has_post_thumbnail() ) : ?>
		<div class="mv">
			<div class="mv-image" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
				<div class="inner">
					<div class="mv-page-title">
						<h2><?php the_title(); ?></h2>
					</div>	
			</div>
			</div>
		</div>
		<?php endif; ?>
		<!-- breadcrumb  -->
		<div class="inner">
		<?php breadcrumb(); ?>			
		</div>		
		<!-- 本文の読み込み -->
		<div class="contents">
				<?php
					if( have_posts() ){
						while( have_posts() ){
							the_post();
							the_content();
						}
					} ?>
		</div>
	</div>
</main>
<!-- 固定ページのコンテンツはここまで -->
<?php get_footer(); ?>