<?php get_header(); ?>
<!-- 検索結果ここから -->
    <div class="search-result">
        <div class="inner">
					<?php breadcrumb(); ?>
            <!-- 検索結果を変数に格納 -->
            <?php
                global $wp_query;
                $total_results = $wp_query->found_posts;
            ?>
            <!-- 検索クエリー文字列の表示 -->
            <h2>「<?php the_search_query(); ?>」の検索結果</h2>
            <!-- ヒットした件数を表示する -->
            <p><?php echo $total_results; ?>件の検索結果</p>
            <!-- 検索件数ごとに条件分岐 -->
            <div class="search-result-wrap">
                <?php
                    if( $total_results > 0 ) :
                    if( have_posts() ) :
                    while( have_posts() ) : the_post();
                ?>
                <!-- 個別アイテム -->
                <div class="search-result-item">
                    <!-- サムネイル -->
                    <div class="search-result-item-image">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="アイキャッチ画像">
                    </div>
                    <!-- タイトル以下 投稿抜粋文章 -->
                    <div class="search-result-item-desc">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php the_excerpt(); ?></p>
                    </div>
                </div>
                <?php endwhile; endif; else: ?>
                <!-- 検索結果にヒットしなかった場合の表示 -->
                <div class="search-result-item">
                    <p>「<?php the_search_query(); ?>」に一致する情報は見つかりませんでした。</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<!-- 検索結果ここまで -->
<?php get_footer(); ?>