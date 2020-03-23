<?php
/* Template Name: Archive Page Custom */
get_header();
echo "<!-- archive.php -->";
?>


<div id="main" class="wrapper style1">
				<div class="container">
					<section>
						<header class="major">
                            <h2>Posts</h2>
                            <span class="byline">Integer sit amet pede vel arcu aliquet pretium</span>
						</header>
                        
                        <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post(); ?>

                                    <h3 class="byline"><?php the_title(); ?></h3>
                                    <?php 
                                        $content = get_the_content();
                                        $resumo = substr($content, 0, 450).'[...]';
                                        echo $resumo;

                                    ?>
                                    <a href="<?php the_permalink();?>" class="button">Saiba mais</a>
                                    <br>

                                <?php endwhile;

                            else :
                                echo '<p> No content found</p>';

                            endif;
                        ?>

                    </section>
				</div>
            </div>





<?php

get_footer();

?>