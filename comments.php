<div class="comments-wrapper">
    <div class="comments" id="comments">
        <!-- COMMENT HEADER -->
        <div class="comments-header">
            <h2 class="comment-reply-title">
                <?php
                if (!have_comments()) {
                    echo "Be The First To Discuss!";
                } else {
                    echo get_comments_number() . " Discussions Happening";
                }
                ?>

        </div>
        <!-- COMMENT CONTENT -->
        <div class="comments-inner">

            <?php
            wp_list_comments(
                array(
                    'avatar-size' => 100,
                    'style' => 'div',
                )
            )
                ?>

        </div>

    </div>

    <!-- COMMENTS REPLY-->
    <hr class="" aria-hidden="true">
    <?php
    if (comments_open()) {
        comment_form(
            array(
                'class_form' => '',
                'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                'title-reply-after' => '</h2>'

            )
        );
    }

    ?>

</div>


