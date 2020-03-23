<?php

get_header();
echo "<!-- single.php -->";
?>


<div id="main" class="wrapper style1">
				<div class="container">
                <section>
						<header class="major">
                            <h2><?php wp_title(''); ?></h2>
						</header>
                        
                        <?php
                            if (have_posts()) :
                                while (have_posts()) : the_post(); ?>

                                    
                                    <?php 
                                        $content = get_the_content();
                                        echo $content;

                                    ?>

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