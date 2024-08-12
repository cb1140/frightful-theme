<article>
    <header>
        <h1></h1>
        <time><?php the_date(); ?></time> <!-- -->

        <ul>
            <?php
            the_tags('<li id="tag">', '</li><li id="tag">', '</li>');
            ?>
        </ul>
        <ul>
    <?php
    $categories = get_the_category();
    if ( ! empty( $categories ) ) {
        foreach ( $categories as $category ) {
            echo '<li id="category"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></li>';
        }
    }
    ?>
</ul>



        
        <p class="comment_count"><?php comments_number(); ?></p>
    </header>

    <article>




<?php
the_content();
comments_template();



?>
</article>