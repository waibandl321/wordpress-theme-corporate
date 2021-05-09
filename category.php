<?php get_header(); ?>
<!-- 投稿ページのコンテンツここから -->
<main>
    <div class="inner">
		<?php breadcrumb(); ?>
        <!-- カテゴリー名 -->
		<h2 class="category-title"><?php single_cat_title(); ?></h2>
        <div class="category-layout">
            <!-- 記事一覧 -->
            <?php if( have_posts() ) : ?>
            <?php while( have_posts() ) : the_post(); ?>
            <div class="category-post-item">
                <!-- アイキャッチ画像 -->
                <div class="category-post-image">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="投稿サムネイル画像">
                </div>
                <!-- タイトル -->
                <h4 class="category-post-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <!-- ディスクリプション -->
                <p>
                <?php
                    $custom_post = get_post_custom(the_ID());
                    $description = $custom_post['description'][0];
                    echo $description;
                ?>
                </p>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
     </div>
</main>
<!-- 投稿ページのコンテンツここまで -->
<?php get_footer(); ?>