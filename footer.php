    </div> <!-- .row -->
  </div> <!-- .container -->
</div> <!-- .content-wrap -->

<?php get_sidebar( 'footer' ); ?>

<div class="footer-wrap">
  <div class="footer container">
    <h5 class="credits">
      <?php esc_attr_e( '&copy;', 'bitter-sweet' ); ?> <?php date( 'Y' ); ?>
       <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <?php bloginfo( 'name' ); ?>
      </a>
      <?php printf( '- Theme By : ', 'bitter-sweet' ); ?> 
      <a href="<?php echo esc_url( __( 'http://oopthemes.com/', 'bitter-sweet' ) ); ?>" title="<?php esc_attr_e( 'OOPThemes', 'bitter-sweet' ); ?>"> 
          <?php printf( 'OOPThemes', 'bitter-sweet' ); ?> 
      </a>
    </h5>
  </div>
</div>
<?php wp_footer(); ?> 
</body>
</html>



 