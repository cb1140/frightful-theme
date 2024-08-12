<article>
    <header>
        <h1></h1>
        <time><?php the_date(); ?></time> <!-- -->

        <ul>
            <?php
            the_tags('<li id="tag">', '</li><li id="tag">', '</li>')
                ?>


        </ul>


        <ul>
            <li id="category"></li>
            <li id="category"></li>
            <li id="category"></li>
        </ul>
        <p class="comment_count"><?php comments_number(); ?></p>
    </header>

    <article>




        <?php
        the_content();
     



        ?>
    </article>