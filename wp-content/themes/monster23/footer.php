</div>
<!-- end of div.wrapper  -->
<footer id="footer" role="contentinfo">
    <?php monster23_secondary_logo() ?>
    <section>
  <?php wp_nav_menu( array(
    'theme_location' => 'footer_menu',
    'container' => 'nav', //div, nav or false
    'menu_class' => 'menu', //ul class="menu"
  )); ?>
</section>
    <?php monster23_tertiary_logo() ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>
