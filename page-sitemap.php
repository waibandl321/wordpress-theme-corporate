<?php
/*
Template Name: サイトマップ
Template Post Type: page
*/
?>
<?php get_header(); ?>
<!-- サイトマップここから -->
<main>
    <div class="inner">
        <div class="sitemap-layout">
            <h2><?php the_title(); ?></h2>
    			<div><?php the_content(); ?></div>
            <div class="sitemap-item-wrap">
                <!-- 固定ページ -->
                <div class="sitemap-item">
                    <h4>ページ</h4>
                    <ul>
                        <?php wp_list_pages('title_li='); ?>
                    </ul>
                </div>
				     <!-- 固定ページ ここまで　-->
                <!-- 投稿ページ カテゴリー単位 -->
                <div class="sitemap-item">
                    <h4>カテゴリー</h4>
                    <ul class="sitemap-categories">
                    <?php
                        $args = array(
                            'orderby' => 'name',
                            'order' => 'ASC'
                        );
                        $cats = get_categories($args); //カテゴリーを取得
                        foreach($cats as $cat) : //個別処理
                    ?>
                        <li>
                            <!-- カテゴリー名・リンク・件数をセット -->
                            <a href="<?php echo get_category_link($cat->term_id); ?>">
                                <?php echo $cat->cat_name; ?>
                                <span class="total_post">(<?php echo $cat->count; ?>)</span>
                            </a>
                            <!-- カテゴリーに紐付く記事 子階層を取得 -->
                            <ul class="sitemap-posts">
                            <?php
                                $cat_list = array(
                                    'cat' => $cat->catID,
                                    'post__not_in' => array(),
                                );
                                $posts = get_posts($cat_list); //カテゴリーIDに紐付く投稿を取得
                                foreach($posts as $post) : setup_postdata($post);
                            ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
					<!-- 投稿ページ カテゴリー単位 ここまで -->
            </div>
        </div>
    </div>
</main>
<!-- サイトマップここまで -->
<?php get_footer(); ?>