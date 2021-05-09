<?php get_header(); ?>
<!-- 投稿ページのコンテンツここから -->
<main>
	<div class="post-layout">
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
	<!-- 本文 -->
    <div class="inner">
        <div class="post-content">
		<!-- パンくずリスト -->
			<?php breadcrumb(); ?>

        <!-- 投稿本文 -->
		<?php
			if( have_posts() ){
				while( have_posts() ){
					the_post();
					the_content();
				}
			} ?>
		</div>
        <!-- 同じカテゴリーのその他の記事 -->
        <?php if( has_category() ) : ?>
        <?php
            $cats = get_the_category();
            $cat_id = $cats[0]->cat_ID;
            $post_id = get_the_ID();
            $args = array(
                'post_type' => 'post',
                'post__not_in' => array( $post_id ),
                'category__in' => $catkwds,
                'orderby' => 'rand'
            );
            $query = new WP_Query( $args );
        ?>
        <div class="other-post">
            <h3 class="other-post-title">その他のコンテンツ</h3>
            <ol>
            <?php while( $query->have_posts() ) : $query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile; ?>
            </ol>
            <?php wp_reset_postdata(); ?>
            <?php dynamic_sidebar('sidebar'); ?>
        </div>
        <?php endif; ?>
	</div>
	<!-- 本文ここまで -->
</div>
</main>
<!-- 投稿ページのコンテンツここまで -->
<?php get_footer(); ?>