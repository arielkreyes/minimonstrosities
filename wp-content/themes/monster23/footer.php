</div>
<!-- end of div.wrapper  -->
<footer id="footer" role="contentinfo">
  <div>
    <p>
      Mini Monstrositites Logo Here
    </p>
  </div>
  <?php wp_nav_menu( array(
    'theme_location' => 'utility_menu',
    'container' => 'nav', //div, nav or false
    'menu_class' => 'menu', //ul class="menu"
  )); ?>  
  <small>©2017 Crimson Moon Design</small>
  <div>
    <p>
      Crimson Moon Logo Here
    </p>
  </div>
</footer>
<?php //TODO: ENQUEUE the font awesome script
wp_footer(); ?>
<script src="https://use.fontawesome.com/ea07c8ffc1.js"></script>
</body>
</html>
