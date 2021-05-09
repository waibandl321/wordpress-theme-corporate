<?php
/*
Template Name: 子ページ一覧
*/
get_header();
?>
<!-- 固定ページのコンテンツはここから -->
<main>
	<div class="inner">
		<?php breadcrumb(); ?>
		<h2 class="parent-page-title"><?php the_title(); ?></h2>
		<div class="child-page-items">
			<?php
				// 親ページのIDを取得
				$parent_id = get_the_ID();
				$args = array(
					'posts_per_page' => -1,
					'orderby' => 'post_date', // 表示順のロジック(基準)
					'order' => 'DESC', // 降順 or 昇順
					'post_type' => 'page', // 投稿タイプ指定
					'post_parent' => $parent_id
				);
				// ページ情報を取得
				$common_pages = new WP_Query( $args );
				// 個別ループ
				if( $common_pages->have_posts() ):
					while( $common_pages->have_posts() ): $common_pages->the_post();
			?>
			<div class="child-page-item">
				<div class="child-page-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="child-page-information">
					<h4 class="child-page-title">
						<a href="<?php the_permalink(); ?>" class="child-page-link"><?php echo the_title(); ?></a>
					</h4>
					<p class="child-page-description">
						<!-- カスタム投稿タイプのdescriptionを取得 -->
						<?php
							$custom_post = get_post_custom(get_the_ID());
							$description = $custom_post['description'][0];
							echo $description;
						?>
					</p>
				</div>
			</div>
			<?php
					endwhile;
					wp_reset_postdata();
				endif;
			?>
		</div>
	</div>
</main>
<!-- 固定ページのコンテンツはここまで -->
<?php get_footer(); ?>