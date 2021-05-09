<?php
/*
Template Name: 投稿アーカイブ
*/
?>
<?php get_header(); ?>
<!-- メインコンテンツ ここから -->
<main>
     <div class="inner">
    		 <?php breadcrumb(); ?>
		 	  <h2 class="archive-title">事例紹介</h2>
          <div class="archive-layout">
          <!-- アーカイブここから -->
          <?php
          // get_query_var : ページネーションの現在のページを取得する
          $paged = get_query_var('paged');
          // リクエストの定義
          $args = array(
               'posts_per_page' => 10,  //1ページに何個表示させるか
               'paged' => $paged,  // 現在のページの位置
               'orderby' => 'post_date', // 表示順のロジック(基準)
               'order' => 'DESC', // 降順 or 昇順
               'post_type' => 'post', // 投稿タイプ指定
               'post_status' => 'publish' // 公開されているかどうか
          );
          $the_query = new WP_Query($args);
          if( $the_query->have_posts() ) :
               while( $the_query->have_posts() ) : $the_query->the_post();
          ?>
               <!-- 各記事一覧 -->
               <article class="post-item">
                    <!-- サムネイル -->
                    <div class="post-thumbnail">
                         <a href="<?php the_permalink(); ?>" class="post-link">
                              <img src="<?php the_post_thumbnail_url(); ?>" alt="投稿サムネイル画像">
                         </a>
                    </div>
                    <!-- 記事タイトル -->
                    <h3 class="post-title"><?php the_title(); ?></h3>
                    <?php
                         $category = get_the_category();
                         $category = $category[0]->name;
                         $category_link = get_category_link( $category[0]->term_id );
								  $custom_field = get_post_custom( $category[0]->term_id );
								  $description = $custom_field['description'][0];
                    ?>
                    <p class="category-name">カテゴリー :
                         <a href="<?php echo $category_link; ?>">
                              <?php echo $category; ?>
                         </a>
                    </p>
                    <p class="post-description"><?php echo $description; ?></p>
               </article>
               <!-- 各記事一覧  ここまで　-->
          <?php endwhile; endif; ?>
          <!-- アーカイブここまで -->
          </div>
     </div>
</main>
<!-- メインコンテンツ ここまで -->
<?php get_footer(); ?>