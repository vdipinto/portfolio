



<?php
/**
 * Template part for displaying resume sections 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<section id="post-<?php the_ID(); ?>">
    <h3><?php the_title(); ?></h3>

    

  <ul class="resume-meta">
    <?php
    $ck = get_post_custom_keys($post_id); //Array

        // drop keys starting with '_'
        $ck = array_filter($ck, function($key){
        return strpos($key, '_') !== 0;
        });

        // store your root keys here
        $data = array();

        foreach($ck as $k){

          $cv = get_post_custom_values($k, $post_id );  //Array

          // drop empty values
          $cv = array_filter($cv);

          if($cv)
            $data[$k] = $cv;

        }

        if($data){
          // your html here; iterate over $data

          
          $html = "";


          foreach($data as $key => $contents) {
            $field_value = implode(array_map('esc_attr', $contents));
            $html = "<li>$field_value</li>";
            // var_dump($field_value);
            printf($html);
          }

          

        }
  ?>
  </ul>

 

  <div class="resume-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'portfolio' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->


  
</section>
	



