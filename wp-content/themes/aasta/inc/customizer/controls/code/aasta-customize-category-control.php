<?php
/**
 * Customize Editor control class.
 *
 * @package aasta
 *
 * @see     WP_Customize_Control
 * @access  public
 */
if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;
/**
 * Class Aasta_Customize_Category_Control
 */
 class Aasta_Customize_Category_Control extends WP_Customize_Control
 {
    private $cats = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->cats = get_categories($options);

        parent::__construct( $manager, $id, $args );
    }

    /**
     * Render the content of the category dropdown
     *
     * @return HTML
     */
    public function render_content()
       {
            if(!empty($this->cats))
            {
                ?>
                    <label>
                      <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                      <select multiple <?php $this->link(); ?>>
                           <?php
                                foreach ( $this->cats as $cat )
                                {
                                    printf('<option value="%s" %s>%s</option>', esc_html( $cat->term_id ), selected($this->value(), $cat->term_id, false), esc_html( $cat->name ));
									
									
                                }
                           ?>
                      </select>
                    </label>
                <?php
            }
       }
 }
?>