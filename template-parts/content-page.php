<div class="post-single">
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <time><?php the_date(); ?></time>
    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="the movie poster">

    <ul>
            <?php
            the_tags('<li id="post-tag">', '</li><li id="post-tag">', '</li>')
                ?>

        
        </ul>
    <p id="post-comment-count"><?php comments_number(); ?></p>
    <div id="excerpt"><?php

    the_excerpt();

    ?></div>
    <a id="read-more" href="<?php the_permalink(); ?>">Read More...</a>
</div>