<?php 
    $u_args = array(
        'post_type' => 'hb-events',
        'orderby' => 'meta_value',
        'meta_key' => 'evt_end_date_and_time',
        'meta_value' => date("Y-m-d H:i:s"),
        'meta_type' => 'DATE',
        'meta_compare' => '>',
        'posts_per_page' => 3,
    );

    $query = new WP_Query ($u_args);

    if ($query -> have_posts()) : ?>
        <h2 class="widget-title">Upcoming Events</h2>
        <ul>
    <?php while ($query -> have_posts()) : ?>
        <li>
        <?php $query -> the_post(); ?>
            <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
        </li>
        <?php endwhile;?>
        </ul>
        <?php wp_reset_postdata();
    endif;

    $p_args = array(
        'post_type' => 'hb-events',
        'orderby' => 'meta_value',
        'meta_key' => 'evt_end_date_and_time',
        'meta_value' => date("Y-m-d H:i:s"),
        'meta_type' => 'DATE',
        'meta_compare' => '<',
        'posts_per_page' => 3,
    );

    $query = new WP_Query ($p_args);

    if ($query -> have_posts()) : ?>
        <h2 class="widget-title">Past Events</h2>
        <ul>
    <?php while ($query -> have_posts()) : ?>
        <li>
        <?php $query -> the_post(); ?>
            <a href="<?php the_permalink() ?>"> <?php the_title(); ?> </a>
        </li>
        <?php endwhile;?>
        </ul>
        <?php wp_reset_postdata();
    endif;
    ?>