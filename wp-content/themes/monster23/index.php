<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Rochester" rel="stylesheet">
    <!-- <title><?php bloginfo(‘name’) ?> - <?php bloginfo(description) ?></title> -->
    <?php wp_head(); //this is a hook. required for plugins admin bar to work ?>
  </head>
  <body>
    <header>
      <h1>Mini Monstrosities</h1>
      <ul>
        <li>USERNAME</li>
      </ul>
      <ul>
        <li>Home</li>
        <li>About Us</li>
        <li>Blog</li>
        <li>Important Dates</li>
        <li>Gallery</li>
      </ul>
    </header>
    <div class="wrapper">
      

    <main id="content">
      <h2>Blog</h2>
      <figure class="post">
        <img src="" />
        <figcaption>
          <h3 class="entry-title">POST TITLE</h3>
          <h4 class=”post-meta”>DATE | AUTHOR</h4>
          <!-- Add in categories later?? -->
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </figcaption>
      </figure>
    </main>
    <article id="sidebar">
      <!-- WIDGET AREA! -->
      <section>
        <label for="search">Search</label>
        <input type="text" name="search" placeholder="Search" />
      </section>
      <section>
        <h5>Calendar</h5>
        <!-- Calendar Stuffs -->
      </section>
      <section>
        <h5>Recently Added</h5>
        <!-- Recent Blog Posts Here:) -->
      </section>
    </article>
  </div>
    <footer>
      <div>
        <p>
          Mini Monstrositites Logo Here
        </p>
      </div>
      <ul>
        <li>CONTACT</li>
        <li>PRIVACY POLICY</li>
        <li>TERMS OF USE</li>
      </ul>
      <small>©2017 Crimson Moon Design</small>
      <div>
        <p>
          Crimson Moon Logo Here
        </p>
      </div>
    </footer>
    <script src="https://use.fontawesome.com/ea07c8ffc1.js"></script>
  </body>
</html>
