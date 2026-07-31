<?php
/**
 * Template Name: Main Template
 *
 * Dynamic NexCove homepage template.
 */

get_header();
?>

<style>
  .nx-main-home{font-family:Arial,Helvetica,sans-serif;color:#111;background:#fff}
  .nx-main-home *{box-sizing:border-box}
  .nx-top-deal{background:#050505;color:#fff;text-align:center;font-size:12px;font-weight:800;letter-spacing:.25px;padding:8px 12px}
  .nx-shell{max-width:1240px;margin:0 auto;padding-left:16px;padding-right:16px}
  .nx-hero{background:#f6f6f6}
  .nx-hero-grid{display:grid;grid-template-columns:1fr 1.75fr 1fr;gap:12px;padding:14px 0}
  .nx-side-deals{display:grid;gap:10px}
  .nx-mini-banner{min-height:106px;padding:16px;display:flex;align-items:flex-end;background:#eadbd1;color:#111;position:relative;overflow:hidden}
  .nx-mini-banner strong{font-size:18px;line-height:1.05;display:block}
  .nx-mini-banner span{font-size:12px;font-weight:700}
  .nx-hero-main{min-height:380px;background:linear-gradient(135deg,#ffd1dc 0%,#dfd4ff 55%,#fff0c9 100%);position:relative;overflow:hidden;display:flex;align-items:center;padding:34px}
  .nx-hero-copy{max-width:470px;position:relative;z-index:2}
  .nx-kicker{font-size:12px;font-weight:900;letter-spacing:1.8px;text-transform:uppercase;margin:0 0 8px;color:#fe3c6d}
  .nx-hero h1{font-size:56px;line-height:.95;margin:0 0 12px;font-weight:900;color:#151515;letter-spacing:0}
  .nx-hero p{font-size:17px;line-height:1.45;margin:0 0 22px;color:#333}
  .nx-cta-row{display:flex;gap:10px;flex-wrap:wrap}
  .nx-btn{display:inline-flex;align-items:center;justify-content:center;min-height:42px;padding:0 22px;font-size:13px;font-weight:900;text-decoration:none;border-radius:2px;letter-spacing:.4px}
  .nx-btn-dark{background:#111;color:#fff}
  .nx-btn-light{background:#fff;color:#111;border:2px solid #111}
  .nx-hero-stack{position:absolute;right:24px;bottom:-18px;display:grid;grid-template-columns:repeat(2,120px);gap:10px;transform:rotate(-3deg)}
  .nx-polaroid{background:#fff;padding:7px;box-shadow:0 14px 34px rgba(0,0,0,.14)}
  .nx-polaroid img{display:block;width:100%;height:150px;object-fit:cover}
  .nx-brand-rail{display:grid;gap:10px}
  .nx-brand-tile{min-height:106px;background:#252525;color:#fff;display:flex;align-items:center;justify-content:center;text-align:center;padding:16px}
  .nx-brand-tile strong{font-size:20px;letter-spacing:1.2px}
  .nx-cat-wrap{padding:22px 0 10px}
  .nx-cats{display:grid;grid-template-columns:repeat(7,1fr);gap:14px}
  .nx-cat{text-align:center;text-decoration:none;color:#222}
  .nx-cat-img{width:82px;height:82px;border-radius:50%;margin:0 auto 8px;overflow:hidden;background:#f4f4f4}
  .nx-cat-img img{width:100%;height:100%;object-fit:cover;display:block}
  .nx-cat span{font-size:12px;font-weight:700;line-height:1.2;display:block}
  .nx-deal-row{display:grid;grid-template-columns:1.25fr 1fr 1fr;gap:12px;padding:18px 0}
  .nx-zone{background:#fff;border:1px solid #eee;min-height:168px;overflow:hidden}
  .nx-zone-head{display:flex;align-items:center;justify-content:space-between;padding:10px 12px;border-bottom:1px solid #eee}
  .nx-zone-head strong{font-size:15px;font-weight:900}
  .nx-zone-head a{font-size:12px;font-weight:800;color:#111;text-decoration:none}
  .nx-zone-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;padding:10px}
  .nx-zone-item img{width:100%;height:104px;object-fit:cover;display:block;background:#f3f3f3}
  .nx-zone-price{font-size:13px;font-weight:900;color:#fe3c6d;margin-top:6px}
  .nx-tabs{display:flex;justify-content:center;gap:28px;border-bottom:1px solid #e7e7e7;margin:12px 0 22px}
  .nx-tabs a{padding:11px 0 10px;text-decoration:none;color:#333;font-size:14px;font-weight:800}
  .nx-tabs a:first-child{color:#111;border-bottom:2px solid #111}
  .nx-section-head{display:flex;align-items:center;justify-content:space-between;gap:16px;margin:28px 0 16px}
  .nx-section-head h2{font-size:22px;font-weight:900;margin:0;color:#111}
  .nx-section-head a{font-size:13px;font-weight:900;color:#111;text-decoration:none}
  .nx-products{display:grid;grid-template-columns:repeat(6,1fr);gap:14px 12px}
  .nx-product{position:relative;text-decoration:none;color:#111;background:#fff}
  .nx-product-photo{aspect-ratio:3/4;background:#f2f2f2;overflow:hidden}
  .nx-product-photo img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .25s ease}
  .nx-product:hover img{transform:scale(1.04)}
  .nx-badge{position:absolute;top:8px;left:8px;background:#fe3c6d;color:#fff;font-size:11px;font-weight:900;padding:4px 6px;border-radius:2px}
  .nx-name{font-size:12px;line-height:1.25;margin:8px 0 4px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .nx-price{font-size:14px;font-weight:900;color:#fe3c6d}
  .nx-price del{color:#999;font-size:12px;font-weight:600;margin-left:4px}
  .nx-rating{font-size:11px;color:#777;margin-top:3px}
  .nx-promo-split{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:34px 0}
  .nx-promo-card{min-height:230px;padding:34px;display:flex;align-items:flex-end;color:#fff;text-decoration:none;position:relative;overflow:hidden}
  .nx-promo-card:first-child{background:linear-gradient(135deg,#ff7043,#ffb199)}
  .nx-promo-card:last-child{background:linear-gradient(135deg,#11182e,#37415d)}
  .nx-promo-card h2{font-size:30px;line-height:1;margin:0 0 8px;color:#fff;font-weight:900}
  .nx-promo-card p{font-size:14px;margin:0 0 12px;color:#fff}
  .nx-promo-card span{font-size:13px;font-weight:900;text-decoration:underline}
  .nx-trust{background:#fafafa;border-top:1px solid #eee;border-bottom:1px solid #eee;margin-top:36px}
  .nx-trust-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;padding:24px 0;text-align:center}
  .nx-trust strong{display:block;font-size:14px;font-weight:900;margin-bottom:4px}
  .nx-trust span{font-size:12px;color:#666}
  .nx-news{background:#111;color:#fff;padding:44px 0}
  .nx-news-grid{display:grid;grid-template-columns:1fr 1fr;gap:28px;align-items:center}
  .nx-news h2{font-size:32px;margin:0 0 10px;color:#fff;font-weight:900}
  .nx-news p{margin:0;color:#bbb;font-size:15px}
  .nx-form{display:flex;gap:8px}
  .nx-form input{flex:1;min-width:0;border:0;border-radius:2px;padding:14px 16px;font-size:14px}
  .nx-form button{border:0;border-radius:2px;background:#fe3c6d;color:#fff;font-weight:900;font-size:13px;padding:0 22px;cursor:pointer}
  @media(max-width:1050px){.nx-hero-grid{grid-template-columns:1fr}.nx-side-deals,.nx-brand-rail{grid-template-columns:repeat(3,1fr)}.nx-cats{grid-template-columns:repeat(5,1fr)}.nx-products{grid-template-columns:repeat(4,1fr)}.nx-deal-row{grid-template-columns:1fr}.nx-hero-stack{opacity:.28}}
  @media(max-width:640px){.nx-hero-main{min-height:430px;padding:28px 20px}.nx-hero h1{font-size:42px}.nx-side-deals,.nx-brand-rail{grid-template-columns:1fr}.nx-cats{grid-template-columns:repeat(4,1fr);gap:12px}.nx-cat-img{width:68px;height:68px}.nx-products{grid-template-columns:repeat(2,1fr)}.nx-promo-split,.nx-news-grid{grid-template-columns:1fr}.nx-trust-grid{grid-template-columns:repeat(2,1fr)}.nx-form{flex-direction:column}.nx-form button{height:44px}.nx-zone-grid{grid-template-columns:repeat(3,1fr)}}
</style>

<main class="nx-main-home">
  <div class="nx-top-deal">FREE SHIPPING ON ORDERS OVER &pound;35 | EXTRA 15% OFF FIRST ORDER | NEW DROPS DAILY</div>

  <section class="nx-hero">
    <div class="nx-shell">
      <div class="nx-hero-grid">
        <div class="nx-side-deals">
          <a class="nx-mini-banner" href="/shop/?product_orderby=date" style="background:#f3d4c6;text-decoration:none;"><span><strong>3 Day Delivery</strong><br>Fresh styles ready fast</span></a>
          <a class="nx-mini-banner" href="/shop/?product_orderby=popularity" style="background:#e4d5bd;text-decoration:none;"><span><strong>Weekly Sale</strong><br>Up to 60% off</span></a>
          <a class="nx-mini-banner" href="/my-account/" style="background:#efe2cd;text-decoration:none;"><span><strong>NexCove Club</strong><br>Member-only deals</span></a>
        </div>

        <div class="nx-hero-main">
          <div class="nx-hero-copy">
            <p class="nx-kicker">Summer essentials</p>
            <h1>Big Looks. Small Prices.</h1>
            <p>Shop daily drops,accessories and trend-led finds for less.</p>
            <div class="nx-cta-row">
              <a class="nx-btn nx-btn-dark" href="/product-category/women/">SHOP Home & Living</a>
              <a class="nx-btn nx-btn-light" href="/product-category/men/">SHOP Electronics</a>
            </div>
          </div>
          <div class="nx-hero-stack" aria-hidden="true">
            <div class="nx-polaroid"><img src="https://images.unsplash.com/photo-1496747611176-843222e1e57c?auto=format&fit=crop&w=360&q=80" alt=""></div>
            <div class="nx-polaroid"><img src="https://images.unsplash.com/photo-1509631179647-0177331693ae?auto=format&fit=crop&w=360&q=80" alt=""></div>
            <div class="nx-polaroid"><img src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=360&q=80" alt=""></div>
            <div class="nx-polaroid"><img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=360&q=80" alt=""></div>
          </div>
        </div>

        <div class="nx-brand-rail">
          <a class="nx-brand-tile" href="/shop/?s=women&post_type=product" style="text-decoration:none;"><strong>Sport & Outdoor</strong></a>
          <a class="nx-brand-tile" href="/shop/?s=men&post_type=product" style="text-decoration:none;background:#6b625d;"><strong>Electronics</strong></a>
          <a class="nx-brand-tile" href="/shop/?s=accessories&post_type=product" style="text-decoration:none;background:#474747;"><strong>ACCESSORIES</strong></a>
        </div>
      </div>
    </div>
  </section>

  <section class="nx-shell nx-cat-wrap">
    <div class="nx-cats">
      <?php
      $uncategorized = get_term_by( 'slug', 'uncategorized', 'product_cat' );
      $exclude_ids   = $uncategorized ? array( (int) $uncategorized->term_id ) : array();
      $cats          = get_terms(
        array(
          'taxonomy'   => 'product_cat',
          'hide_empty' => false,
          'exclude'    => $exclude_ids,
          'orderby'    => 'menu_order',
          'order'      => 'ASC',
          'number'     => 10,
        )
      );

      if ( is_wp_error( $cats ) || empty( $cats ) ) {
        $cats = get_terms(
          array(
            'taxonomy'   => 'product_cat',
            'hide_empty' => false,
            'exclude'    => $exclude_ids,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'number'     => 10,
          )
        );
      }

      if ( ! is_wp_error( $cats ) && ! empty( $cats ) ) :
        foreach ( $cats as $cat ) :
          $thumb_id  = get_term_meta( $cat->term_id, 'thumbnail_id', true );
          $thumb_url = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'thumbnail' ) : '';
          $thumb_url = $thumb_url ? $thumb_url : wc_placeholder_img_src();
      ?>
        <a class="nx-cat" href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
          <div class="nx-cat-img"><img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>"></div>
          <span><?php echo esc_html( $cat->name ); ?></span>
        </a>
      <?php
        endforeach;
      endif;
      ?>
    </div>
  </section>

  <section class="nx-shell">
    <?php
    $nx_super_deals = wc_get_products(
      array(
        'status'  => 'publish',
        'limit'   => 3,
        'on_sale' => true,
        'orderby' => 'price',
        'order'   => 'ASC',
      )
    );
    $nx_top_trends = wc_get_products(
      array(
        'status'  => 'publish',
        'limit'   => 3,
        'orderby' => 'popularity',
        'order'   => 'DESC',
      )
    );
    $nx_brand_zone = wc_get_products(
      array(
        'status'  => 'publish',
        'limit'   => 3,
        'orderby' => 'date',
        'order'   => 'DESC',
      )
    );
    $nx_brand_labels = array( 'New', 'Hot', 'Edit' );
    ?>
    <div class="nx-deal-row">
      <div class="nx-zone">
        <div class="nx-zone-head"><strong>Super Deals</strong><a href="/shop/?product_orderby=price">View all</a></div>
        <div class="nx-zone-grid">
          <?php foreach ( $nx_super_deals as $product ) :
            $product_id = $product->get_id();
            $image_url  = get_the_post_thumbnail_url( $product_id, 'woocommerce_thumbnail' );
            $image_url  = $image_url ? $image_url : wc_placeholder_img_src( 'woocommerce_thumbnail' );
            $sale_price = $product->get_sale_price() ? $product->get_sale_price() : $product->get_price();
          ?>
            <a class="nx-zone-item" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>"><div class="nx-zone-price"><?php echo wp_kses_post( wc_price( $sale_price ) ); ?></div></a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="nx-zone">
        <div class="nx-zone-head"><strong>Top Trends</strong><a href="/shop/?product_orderby=popularity">View all</a></div>
        <div class="nx-zone-grid">
          <?php foreach ( $nx_top_trends as $product ) :
            $product_id = $product->get_id();
            $image_url  = get_the_post_thumbnail_url( $product_id, 'woocommerce_thumbnail' );
            $image_url  = $image_url ? $image_url : wc_placeholder_img_src( 'woocommerce_thumbnail' );
            $price      = $product->is_on_sale() && $product->get_sale_price() ? $product->get_sale_price() : $product->get_price();
          ?>
            <a class="nx-zone-item" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>"><div class="nx-zone-price"><?php echo wp_kses_post( wc_price( $price ) ); ?></div></a>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="nx-zone">
        <div class="nx-zone-head"><strong>Brand Zone</strong><a href="/shop/?product_orderby=date">Explore</a></div>
        <div class="nx-zone-grid">
          <?php foreach ( $nx_brand_zone as $index => $product ) :
            $product_id = $product->get_id();
            $image_url  = get_the_post_thumbnail_url( $product_id, 'woocommerce_thumbnail' );
            $image_url  = $image_url ? $image_url : wc_placeholder_img_src( 'woocommerce_thumbnail' );
            $label      = $nx_brand_labels[ $index % count( $nx_brand_labels ) ];
          ?>
            <a class="nx-zone-item" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>"><div class="nx-zone-price"><?php echo esc_html( $label ); ?></div></a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <?php wp_nonce_field( 'nx_products_tab', 'nx_products_tab_nonce' ); ?>
    <nav class="nx-tabs" aria-label="Product sections">
      <a class="nx-tab-active" style="color:#111;border-bottom:2px solid #111" href="/shop/?product_orderby=popularity" data-orderby="popularity">Best Sellers</a>
      <a href="/shop/?product_orderby=date" data-orderby="date">New In</a>
      <a href="/shop/?product_orderby=rating" data-orderby="rating">5-Star Rated</a>
    </nav>

    <div class="nx-section-head">
      <h2>Best Sellers</h2>
      <a href="/shop/?product_orderby=popularity">View More</a>
    </div>
    <div class="nx-products">
      <?php
      $products = function_exists( 'nx_get_products_for_tab' ) ? nx_get_products_for_tab( 'popularity', 12 ) : array();
      if ( ! empty( $products ) ) :
        foreach ( $products as $product ) :
          if ( function_exists( 'nx_render_product_card' ) ) {
            nx_render_product_card( $product );
          }
        endforeach;
      else :
      ?>
        <p class="nx-name">No products found.</p>
      <?php endif; ?>
    </div>

    <div class="nx-promo-split">
      <a class="nx-promo-card" href="/product-category/women/">
        <div><h2>NEW IN: Home & Living</h2><p>Fresh drops, statement basics and trending fits.</p><span>Shop Now</span></div>
      </a>
      <a class="nx-promo-card" href="/product-category/men/">
        <div><h2>Sport & Outdoor</h2><p>Casual layers, daily essentials and clean accessories.</p><span>Explore</span></div>
      </a>
    </div>
  </section>

  <section class="nx-trust">
    <div class="nx-shell nx-trust-grid">
      <div><strong>Free Shipping</strong><span>On orders over &pound;35</span></div>
      <div><strong>Free Returns</strong><span>Easy 60-day returns</span></div>
      <div><strong>Secure Payment</strong><span>SSL encrypted checkout</span></div>
      <div><strong>Daily New Arrivals</strong><span>Fresh finds every day</span></div>
    </div>
  </section>

  <section class="nx-news">
    <div class="nx-shell nx-news-grid">
      <div>
        <h2>Get 15% Off Your First Order</h2>
        <p>Subscribe for exclusive deals, new arrivals and trend alerts.</p>
      </div>
      <form class="nx-form" method="post">
        <?php wp_nonce_field( 'nx_newsletter_subscribe', 'nx_newsletter_nonce' ); ?>
        <input type="email" name="email" placeholder="Enter your email address" aria-label="Email address">
        <button type="submit">SUBSCRIBE</button>
      </form>
      <p class="nx-news-message" aria-live="polite"></p>
    </div>
  </section>
</main>

<script>
(function(){
  var ajaxUrl = <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?>;
  var products = document.querySelector('.nx-products');
  var tabs = document.querySelectorAll('.nx-tabs a[data-orderby]');
  var productsNonce = document.getElementById('nx_products_tab_nonce');

  tabs.forEach(function(tab){
    tab.addEventListener('click', function(event){
      event.preventDefault();
      if (!products || !productsNonce) return;

      var formData = new FormData();
      formData.append('action', 'nx_products_tab');
      formData.append('orderby', tab.getAttribute('data-orderby') || 'popularity');
      formData.append('nonce', productsNonce.value);

      products.style.opacity = '0.4';

      fetch(ajaxUrl, {
        method: 'POST',
        credentials: 'same-origin',
        body: formData
      })
      .then(function(response){ return response.text(); })
      .then(function(html){
        products.innerHTML = html;
        tabs.forEach(function(item){
          item.classList.remove('nx-tab-active');
          item.style.color = '#333';
          item.style.borderBottom = '0';
        });
        tab.classList.add('nx-tab-active');
        tab.style.color = '#111';
        tab.style.borderBottom = '2px solid #111';
      })
      .finally(function(){
        products.style.opacity = '1';
      });
    });
  });

  var newsletterForm = document.querySelector('.nx-news .nx-form');
  var newsletterMessage = document.querySelector('.nx-news-message');

  if (newsletterForm && newsletterMessage) {
    newsletterForm.addEventListener('submit', function(event){
      event.preventDefault();

      var email = newsletterForm.querySelector('input[name="email"]');
      var nonce = newsletterForm.querySelector('input[name="nx_newsletter_nonce"]');
      var formData = new FormData();
      formData.append('action', 'nx_newsletter_subscribe');
      formData.append('email', email ? email.value : '');
      formData.append('nonce', nonce ? nonce.value : '');
      newsletterMessage.textContent = 'Submitting...';

      fetch(ajaxUrl, {
        method: 'POST',
        credentials: 'same-origin',
        body: formData
      })
      .then(function(response){ return response.json(); })
      .then(function(data){
        newsletterMessage.textContent = data.message || '';
        newsletterMessage.style.color = data.success ? '#ffffff' : '#ffb3c4';
        if (data.success && email) email.value = '';
      })
      .catch(function(){
        newsletterMessage.textContent = 'Something went wrong. Please try again.';
        newsletterMessage.style.color = '#ffb3c4';
      });
    });
  }
})();
</script>

<?php
get_footer();
