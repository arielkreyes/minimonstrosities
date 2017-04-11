</div>
<!-- end of div.wrapper  -->
<footer id="footer" role="contentinfo">
    <?php monster23_secondary_logo() ?>

  <?php wp_nav_menu( array(
    'theme_location' => 'footer_menu',
    'container' => 'nav', //div, nav or false
    'menu_class' => 'menu', //ul class="menu"
  )); ?>  
  <small>©2017 Crimson Moon Design</small>
  <div>
    <?php monster23_tertiary_logo() ?>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
