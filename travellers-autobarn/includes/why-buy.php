<div class="why-buy-box">

              <h4><?php 
                        if(get_field('why_buy_from_us_title', 'option') !=""):
                            echo get_field('why_buy_from_us_title', 'option');
                        else:
                            echo "Why buy from us?";
                        endif;
                    ?></h4>

            <ul>
            
                <?php
                    if (have_rows('why_buy_from_us', 'option')):
                        while(have_rows('why_buy_from_us', 'option')):
                            the_row();
                            $list = get_sub_field('why_buy_list');                           
                ?>
                            <li><?php echo $list;?></li>
                <?php
                        endwhile;
                    endif;
                ?> 
            </ul>      

              
         </div> <!-- why-hire-box -->