<?php
/**ReduxFramework Sample Config File
  For full documentation, please visit: https://github.com/ReduxFramework/ReduxFramework/wiki
 * */

if (!class_exists("Redux_Framework_sample_config")) {

    class Redux_Framework_sample_config {

        public $args = array();
        public $sections = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if ( !class_exists("ReduxFramework" ) ) {
                return;
            }

            $this->initSettings();
        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            //add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

            // Function to test the compiler hook and demo CSS output.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            // Dynamically add a section. Can be also used to modify sections/fields
            add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**
          *This is a test function that will let you see when the compiler hook occurs.
          *It only runs if a field   set with compiler=>true is changed.
         * */
        function compiler_action($options, $css) {
            //echo "<h1>The compiler hook has run!";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
              require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
              $wp_filesystem->put_contents(
              $filename,
              $css,
              FS_CHMOD_FILE // predefined mode settings for WP files
              );
              }
             */
        }

        /**
         * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
         * Simply include this function in the child themes functions.php file.
         * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
         * so you must use get_template_directory_uri() if you want to use any of the built in icons
         * */
        function dynamic_section($sections) {
            //$sections = array();
            // $sections[] = array(
            //     'title' => __('Section via hook', 'themestudio'),
            //     'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'themestudio'),
            //     'icon' => 'el-icon-paper-clip',
            //     // Leave this as a blank section, no options just some intro text set above.
            //     'fields' => array()
            // );

            return $sections;
        }

        /**
         * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**
         * Filter hook for filtering the default value of any given field. Very useful in development mode.
         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = "Testing filter hook!";

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));

            }
        }

        public function setSections() {

            /**
             * Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode(".", $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[] = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct = wp_get_theme();
            $this->theme = $ct;
            $item_name = $this->theme->get('Name');
            $tags = $this->theme->Tags;
            $screenshot = $this->theme->get_screenshot();
            $class = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'themestudio'), $this->theme->display('Name'));
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
            <?php endif; ?>

                <h4>
            <?php echo $this->theme->display('Name'); ?>
                </h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'themestudio'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'themestudio'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'themestudio') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
                <?php
                if ($this->theme->parent()) {
                    printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'themestudio'), $this->theme->parent()->display('Name'));
                }
                ?>

                </div>

            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }


            /*--General Settings--*/
            $this->sections[] = array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'themestudio'),
                'fields' => array(
                    array(
                        'id'    => 'general_introduction',
                        'type'  => 'info',
                        'style' => 'success',
                        'title' => __('Welcome to ARIVA Theme Option Panel', 'themestudio'),
                        'icon'  => 'el-icon-info-sign',
                        'desc'  => __( 'From here you can config ARIVA theme in the way you need.', 'themestudio')
                    ),
                    array(
                        'id' => 'ts-logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo upload', 'themestudio'),
                        'compiler' => 'true',
                        'desc' => __('Upload your logo image', 'themestudio'),
                        'subtitle' => __('Upload your custom logo image', 'themestudio'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/logo.png'),

                    ),
                    array(
                        'id' => 'ts-logo2x',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Upload retina logo', 'themestudio'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('Upload your retina logo image', 'themestudio'),
                        'subtitle' => __('Upload your custom retina logo image(logo@2x.png)', 'themestudio'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/logo@2x.png'),
                    ),
                    array(
                        'id' => 'ts-favicon',
                        'type' => 'media',
                        'title' => __('Upload favicon', 'themestudio'),
                        'desc' => __('Upload a 16px x 16px .png or .gif image that will be your favicon.', 'themestudio'),
                        'subtitle' => __('Upload your custom favicon image', 'themestudio'),
                        'default' => array('url' => get_template_directory_uri().'/assets/images/favicon.png'),

                    ),
                    array(
                        'id' => 'ts-accent-color',
                        'type' => 'color',
                        'title' => __('Accent Color', 'themestudio'),
                        'desc' => __('Change this color to alter the accent color globally for your website. ', 'themestudio'),
                        'subtitle' => __('Accent color (default: ).', 'themestudio'),
                        'default' => '#5ed9e7',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'ts-css-code',
                        'type' => 'ace_editor',
                        'title' => __('Custom CSS', 'themestudio'),
                        'subtitle' => __('Paste your custom CSS code here.', 'themestudio'),
                        'mode' => 'css',
                        'theme' => 'monokai',
                        'desc' => 'Custom css code.',
                        'default' => ""
                    ),
                    array(
                        'id' => 'general_js_code',
                        'type' => 'ace_editor',
                        'title' => __('Custom JS ', 'themestudio'),
                        'subtitle' => __('Paste your custom JS code here.', 'themestudio'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'desc' => 'Custom javascript code',
                        'default' => "jQuery(document).ready(function(){\n\n});"
                    ),
                    array(
                        'id' => 'ts-tracking-code',
                        'type' => 'ace_editor',
                        'title' => __('Google Analytics', 'themestudio'),
                        'subtitle' => __('Paste your google tracking code here.', 'themestudio'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'desc' => 'Custom javascript code',
                        'default' => "jQuery(document).ready(function(){\n\n});"
                    ),
                    array(
                        'id'        => 'ts-switch-combine-css',
                        'type'      => 'switch',
                        'title'     => __('Enable Combine Css File', 'themestudio'),
                        'subtitle'  => __('Combine Css File', 'themestudio'),
                        'default'   => false,
                    ),
                )
            );

            /*--Typograply Options--*/
            $this->sections[] = array(
                'icon' => 'el-icon-font',
                'title' => __('Typography Options', 'themestudio'),
                'fields' => array(
                    array(
                        'id' => 'ts-typo-body-font',
                        'type' => 'typography',
                        'title' => __('Body Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the body font properties.', 'themestudio'),
                        'google' => true,
                        'output' => 'body',
                        'default' => array(
                            'font-family' => 'Droid Serif',
                        ),
                    ),
                    array(
                        'id' => 'ts-menu-font',
                        'type' => 'typography',
                        'title' => __('Menu Item Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the menu font properties.', 'themestudio'),
                        'output' => array('nav'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                        ),
                    ),
                    array(
                        'id' => 'ts-typo-h1-font',
                        'type' => 'typography',
                        'title' => __('Heading 1(H1) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H1 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                        ),
                        'output' => 'h1',
                    ),
                    array(
                        'id' => 'ts-typo-h2-font',
                        'type' => 'typography',
                        'title' => __('Heading 2(H2) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H2 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                            'font-weight' => '500'
                        ),
                        'output' => 'h2',
                    ),
                    array(
                        'id' => 'ts-typo-h3-font',
                        'type' => 'typography',
                        'title' => __('Heading 3(H3) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H3 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                            'font-weight' => '400'
                        ),
                        'output' => 'h3',
                    ),
                    array(
                        'id' => 'ts-typo-h4-font',
                        'type' => 'typography',
                        'title' => __('Heading 4(H4) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H4 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                        ),
                        'output' => 'h4',
                    ),
                    array(
                        'id' => 'ts-typo-h5-font',
                        'type' => 'typography',
                        'title' => __('Heading 5(H5) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H5 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                        ),
                        'output' => 'h5',
                    ),

                    array(
                        'id' => 'ts-typo-h6-font',
                        'type' => 'typography',
                        'title' => __('Heading 6(H6) Font Setting', 'themestudio'),
                        'subtitle' => __('Specify the H6 tag font properties.', 'themestudio'),
                        'google' => true,
                        'default' => array(
                            'font-family' => 'Montserrat',
                        ),
                        'output' => 'h6',
                    ),
                )
            );


            /*--Menu--*/
            $this->sections[] = array(
                'title' => __('Menu Settings', 'themestudio'),
                'desc' => __('Menu Settings', 'themestudio'),
                'icon' => 'el-icon-align-justify',
                'fields' => array(
                    array(
                        'id' => 'menu-style',
                        'type' => 'button_set',
                        'title' => __('Select your menu style', 'themestudio'),
                        'subtitle' => __('Select clasic menu or dropdown menu', 'themestudio'),
                        'options' => array( 'dropdown_menu' => 'Full screen menu', 'clasic_menu' => 'Clasic menu'),
                        'default' => 'clasic_menu',
                    ),
                    array(
                        'id' => 'ts-menu-bg-color',
                        'type' => 'color',
                        'title' => __('Menu background olor', 'themestudio'),
                        'desc' => __('Menu background color. ', 'themestudio'),
                        'subtitle' => __('Accent color (default: ).', 'themestudio'),
                        'default' => '#ffffff',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'ts-menu-bg-opacity',
                        'type' => 'slider',
                        'title' => __('Background menu color opacity', 'themestudio'),
                        'subtitle' => __('Background menu color opacity from 0 to 1', 'themestudio'),
                        'desc' => __('Min: 0, max: 1, step: 0.1, default value: 0.95', 'themestudio'),
                        "default" => 1,
                        "min" => 0,
                        "step" => 0.1,
                        "max" => 1,
                        'resolution' => 0.1,
                        'display_value' => 'text'
                    ),
                    array(
                        'id' => 'ts-menu-autohide',
                        'type' => 'button_set',
                        'title' => __('Menu sticky show on scroll', 'themestudio'),
                        'subtitle' => __('Menu show on scroll', 'themestudio'),
                        'desc' => __('Main menu will be hidden then show up when scroll down.', 'themestudio'),
                        'options' => array( 'menu_show' => 'Show onload', 'menu_hide' => 'Hide onload'),
                        'default' => 'menu_hide',
                    ),
                )
            );


            /*--Blog--*/
            $this->sections[] = array(
                'title' => __('Blog Settings', 'themestudio'),
                'desc' => __('Blog Settings', 'themestudio'),
                'icon' => 'el-icon-th-list',
                'fields' => array(
                    array(
                        'id'            => 'ts-blog-title',
                        'type'          => 'text',
                        'title'         => __('Blog title', 'themestudio'),
                        'subtitle'      => __('Title for blog page', 'themestudio'),
                        'default'       => 'Blog',
                    ),
                    array(
                        'id'            => 'ts-blog-sub-title',
                        'type'          => 'text',
                        'title'         => __('Blog sub title', 'themestudio'),
                        'subtitle'      => __('Sub title for blog page', 'themestudio'),
                        'default'       => 'Our perspective on digital (and other things)',
                    ),
                    array(
                        'id'            => 'ts-blog-reading-text',
                        'type'          => 'text',
                        'title'         => __('Continue reading', 'themestudio'),
                        'subtitle'      => __('Continue reading text', 'themestudio'),
                        'default'       => 'read more',
                    ),
                    array(
                        'id'            => 'ts-blog-content',
                        'type'          => 'select',
                        'title'         => __('Blog metas', 'themestudio'),
                        'options'       => array(
                            'content'   => 'Show Content',
                            'excerpt'   => 'Show Excerpt',
                        ),
                        'default'       => 'excerpt',
                    ),
                    array(
                        'id'        => 'ts-blog-sidebar-position',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Sidebar position', 'themestudio'),
                        'subtitle'  => __('Select sidebar position.', 'themestudio'),
                        'desc' => __('Select sidebar on left or right', 'themestudio'),
                        'options'   => array(
                            '1' => array('alt' => '1 Column Left',      'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cl.png'),
                            '2' => array('alt' => '2 Column Right',     'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cr.png'),
                            '3' => array('alt' => 'Full Width',         'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                        ),
                        'default'   => '2',
                    ),
                    array(
                        'id'       => 'ts-blog-metas',
                        'type'     => 'select',
                        'multi'    => true,
                        'title'    => __('Blog metas', 'themestudio'),
                        'options'  => array(
                            'author'    => 'Author',
                            'date'      => 'Date time',
                            'category'  => 'Category',
                            'comment'   => 'Comment',
                            'tags'      => 'Tags',
                        ),
                        'default'  => array('date','category','comment')
                    ),
                    array(
                        'id'       => 'ts-blog-headerbg',
                        'type'     => 'background',
                        'title'    => __('Default Archive Header Background', 'themestudio'),
                        'subtitle' => __('Default Archive background with image, color, etc.', 'themestudio'),
                        'desc'     => '',
                        'default'  => array(
                            'background-image' => get_template_directory_uri().'/assets/images/blog-banner.png',
                            'background-position' => 'center top',
                            'background-repeat' =>'no-repeat',
                            'background-size' => 'cover',
                            'background-attachment' =>'fixed'
                        ),
                        'output'   => '.banner.parallax-section',
                    ),
                ),
            );
 /*--Form Mailchip setting--*/
            $this->sections[] = array(
                'title'  => __('Mailchimp Settings', 'themestudio'),
                'desc'   => __('Mailchimp Settings', 'themestudio'),
                'icon'   => 'el-icon-envelope-alt',
                'fields' => array(
                    array(
                        'id'            => 'ts-subscribe-form',
                        'type'          => 'section',
                        'indent'        => true,
                        'title'         => __('Subscribe Form Settings', 'themestudio'),
                        'subtitle'      => __('Settings for the Subscribe Form (titled "Email me when it\'s finished" by default).', 'themestudio')
                    ),  
                    array(
                        'id' => 'ts-subscribe-enable',
                        'type' => 'switch',
                        'title' => __('Enable Subscribe', 'themestudio'),
                        'subtitle' => __('Enable Subscribe on/off', 'themestudio'),
                        "default" => '1',
                        1 => 'Enabled',
                        0 => 'Disabled',
                    ),                  
                    array(
                        'id'            => 'ts-subscribe-Mailchimp_API_Key',
                        'type'          => 'text',
                        'title'         => __('MailChimp API Key', 'themestudio'),
                        'subtitle'      => __('In order to use MailChimp you will need an API Key. You can generate API Keys by going to <a href="#" target="_blank">Account settings -> Extras -> API keys</a>', 'themestudio'),
                        'desc'          => '',
                        'default'       => 'dde897fefd2ac9c63e81ae53e194a47c-us9'
                    ),
                    array(
                        'id'            => 'ts-subscribe-Mailchimp_list_ID',
                        'type'          => 'text',
                        'title'         => __('MailChimp List ID', 'themestudio'),
                        'subtitle'      => __('Next you need to create a List in MailChimp and paste it is ID here. The List ID can be found in the List is Settings, on the right hand side.', 'themestudio'),
                        'desc'          => '',
                        'default'       => '6ec12b0fdf'
                    ),
                    array(
                        'id'            => 'ts-title-subscribe',
                        'type'          => 'text',
                        'title'         => __('Title Subscribe', 'themestudio'),
                        'subtitle'      => __('The title for subscribe mailchip.', 'themestudio'),
                        'desc'          => __('The title for subscribe mailchip.', 'themestudio'),
                        'default'       => 'SUBSCIRBE'
                    ),
                    array(
                        'id'            => 'ts-phone-subscribe',
                        'type'          => 'text',
                        'title'         => __('Number phone', 'themestudio'),
                        'subtitle'      => __('The number phone for subscribe mailchip.', 'themestudio'),
                        'desc'          => '',
                        'default'       => '+44 (0) 1753 456789'
                    ),
                    array(
                        'id'            => 'ts-website-subscribe',
                        'type'          => 'text',
                        'title'         => __('Your Website', 'themestudio'),
                        'subtitle'      => __('The your website for subscribe mailchip.', 'themestudio'),
                        'desc'          => '',
                        'default'       => 'hello@aviragroup.co.uk'
                    ),                                    
                )
            );
            /*--Portfolio Setting--*/
            $this->sections[] = array(
                'title' => __('Portfolio Settings', 'themestudio'),
                'desc' => __('Portfolio Settings', 'themestudio'),
                'icon' => 'el-icon-folder',
                'fields' => array(
                    array(
                        'id'            => 'portfolio_title',
                        'type'          => 'text',
                        'title'         => __('Portfolio archive title', 'themestudio'),
                        'subtitle'      => __('Show title portfolio archive page', 'themestudio'),
                        'default'       => 'Our Portfolio',
                    ),
                     array(
                        'id'            => 'portfolio_sub_title',
                        'type'          => 'text',
                        'title'         => __('Portfolio archive sub title', 'themestudio'),
                        'subtitle'      => __('Show sub title portfolio archive page', 'themestudio'),
                        'default'       => 'creating the most beautiful designs',
                    ),
                     array(
                        'id'            => 'portfolio-single-loading',
                        'type'          => 'select',
                        'title'         => __('Portfolio AJAX/Redirect', 'themestudio'),
                        'options'       => array(
                            'ajax'   => 'Load AJAX',
                            'redirect'   => 'Redirect',
                        ),
                        'default'       => 'ajax',
                    ),
                     array(
                        'id' => 'portfolio-item-width',
                        'type' => 'slider',
                        'title' => __('Portfolio item width', 'themestudio'),
                        'subtitle' => __('This option set width for portfolio item', 'themestudio'),
                        'desc' => __('Portfolio with. Min: 50, max: 1000, step: 1, default value: 100', 'themestudio'),
                        "default" => 474,
                        "min" => 50,
                        "step" => 15,
                        "max" => 1000,
                        'display_value' => 'text'
                    ),
                     array(
                        'id' => 'portfolio-item-height',
                        'type' => 'slider',
                        'title' => __('Portfolio item height', 'themestudio'),
                        'subtitle' => __('This option set height for portfolio item', 'themestudio'),
                        'desc' => __('Portfolio with. Min: 50, max: 1000, step: 1, default value: 100', 'themestudio'),
                        "default" => 350,
                        "min" => 50,
                        "step" => 15,
                        "max" => 1000,
                        'display_value' => 'text'
                    ),
                     array(
                        'id' => 'show_hide_filter',
                        'type' => 'button_set',
                        'title' => __('Show hide filter portfolio', 'themestudio'),
                        'subtitle' => __('Show/hide portfolio onload', 'themestudio'),
                        'desc' => __('Select show hide style.', 'themestudio'),
                        'options' => array( 'show_filter_portfolio' => 'Show', 'hide_filter_portfolio' => 'Hide'),
                        'default' => 'show_filter_portfolio',
                    ),
                    array(
                        'id'            => 'posts_per_page',
                        'type'          => 'text',
                        'title'         => __('Portfolio number per page', 'themestudio'),
                        'subtitle'      => __('Portfolio number per page', 'themestudio'),
                        'default'       => '12',
                    ),
                     array(
                        'id' => 'portfolio_hover_opacity',
                        'type' => 'slider',
                        'title' => __('Portfolio hover opacity', 'themestudio'),
                        'subtitle' => __('Portfolio hover opacity from 0 to 1', 'themestudio'),
                        'desc' => __('Min: 0, max: 1, step: 0.1, default value: 0.85', 'themestudio'),
                        "default" => 0.85,
                        "min" => 0,
                        "step" => 0.1,
                        "max" => 1,
                        'resolution' => 0.1,
                        'display_value' => 'text'
                    ),
                    array(
                        'id' => 'portfolio_switch_pagination',
                        'type' => 'button_set',
                        'title' => __('Show hide portfolio pagination', 'themestudio'),
                        'subtitle' => __('Show/hide portfolio pagination', 'themestudio'),
                        'desc' => __('Select show hide style.', 'themestudio'),
                        'options' => array( 'show_portfolio_pagination' => 'Show', 'hide_portfolio_pagination' => 'Hide'),
                        'default' => 'hide_portfolio_pagination',
                    ),
                    array(
                        'id'       => 'portfolio_banner_bg',
                        'type'     => 'background',
                        'title'    => __('Default portfolio header background', 'themestudio'),
                        'subtitle' => __('Default Portfolio background with image, color, etc.', 'themestudio'),
                        'desc'     => '',
                        'default'  => array(
                            'background-image' => get_template_directory_uri().'/assets/images/blog-banner.png',
                            'background-position' => 'center top',
                            'background-repeat' =>'no-repeat',
                            'background-size' => 'cover',
                            'background-attachment' =>'fixed'
                        ),
                        'output'   => '.portfolio-banner',
                    ),
                ),
            );
            /**
             * Check if WooCommerce is active
             **/
            if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                // Put your plugin code here

                /*-- Woocommerce Setting--*/
                $this->sections[] = array(
                    'title' => __('Woocommerce', 'themestudio'),
                    'desc' => __('Woocommerce Settings', 'themestudio'),
                    'icon' => 'el-icon-shopping-cart',
                    'fields' => array(
                        array(
                            'id'        => 'woo_layout',
                            'type'      => 'image_select',
                            'compiler'  => true,
                            'title'     => __('Woocommerce sidebar position', 'themestudio'),
                            'subtitle'  => __('Select Woocommerce sidebar position.', 'themestudio'),
                            'desc' => __('Select sidebar on left or right', 'themestudio'),
                            'options'   => array(
                                'left-sidebar' => array('alt' => '1 Column Left',      'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cl.png'),
                                'right-sidebar' => array('alt' => '2 Column Right',     'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/2cr.png'),
                                'fullwidth' => array('alt' => 'Full Width',         'img' => get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/1column.png'),
                            ),
                            'default'   => 'right-sidebar',
                        ),
                       array(
                        'id'        => 'woo_product_layout',
                        'type'      => 'image_select',
                        'compiler'  => true,
                        'title'     => __('Woocommerce product layout', 'themestudio'),
                        'subtitle'  => __('Set number column in product archive page.', 'themestudio'),
                        'options'   => array(
                                '3' => array('alt' => '3 Column ',      'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/3columns.png'),
                                '4' => array('alt' => '4 Column ',      'img' =>get_template_directory_uri() . '/core/admin/reduxframework/sample/patterns/4columns.png')
                            ),
                            'default'   => '3',
                        ),
                    ),
                );
            }
            /*--Social setting--*/
            $this->sections[] = array(
                'title' => __('Social Settings', 'themestudio'),
                'desc' => __('Social Settings', 'themestudio'),
                'icon' => 'el-icon-credit-card',
                'fields' => array(
                    array(
                    'id'          => 'ts-social-list',
                    'type'        => 'slides',
                    'title'       => __('Social list', 'themestudio'),
                    'subtitle'    => __('Unlimited slides with drag and drop sortings.', 'themestudio'),
                    'desc'        => __('Font awesome icon class', 'themestudio'),
                    'placeholder' => array(
                        'title'           => __('This is a class icon font awesome.', 'themestudio'),
                        'description'     => __('Description Here', 'themestudio'),
                        'url'             => __('Give us a link!', 'themestudio'),
                    ),
                    'default'     => array(
                        array(
                            'title'           => __('facebook', 'themestudio'),
                            'description'     => __('Facebook', 'themestudio'),
                            'url'             => __('http://facebook.com', 'themestudio'),
                        ),
                        array(
                            'title'           => __('twitter', 'themestudio'),
                            'description'     => __('Twitter', 'themestudio'),
                            'url'             => __('http://twitter.com', 'themestudio'),
                        ),
                        array(
                            'title'           => __('google-plus', 'themestudio'),
                            'description'     => __('Goole plus', 'themestudio'),
                            'url'             => __('http://plus.google.com', 'themestudio'),
                        ),
                        array(
                            'title'           => __('behance', 'themestudio'),
                            'description'     => __('Behance', 'themestudio'),
                            'url'             => __('http://behance.com', 'themestudio'),
                        ),
                        array(
                            'title'           => __('dribbble', 'themestudio'),
                            'description'     => __('Dribbble', 'themestudio'),
                            'url'             => __('http://dribbble.com', 'themestudio'),
                        ),
                    ),
                ),
               )
            );

            /*--Footer setting--*/
            $this->sections[] = array(
                'title' => __('Footer Settings', 'themestudio'),
                'desc' => __('Footer Settings', 'themestudio'),
                'icon' => 'el-icon-credit-card',
                'fields' => array(
                    array(
                        'id' => 'footer_copyright_text',
                        'type' => 'editor',
                        'title' => __('Footer copyright text', 'themestudio'),
                        'subtitle' => __('Copyright text', 'themestudio'),
                        'default' => __('<p>&copy; Ariva 2014</p>', 'themestudio'),
                    ),
                )
            );

            /*--Import/Export Setting--*/
            $this->sections[] = array(
                'title' => __('Import/Export ', 'themestudio'),
                'desc' => __('Import/Export Settings', 'themestudio'),
                'icon' => 'el-icon-refresh',
                'fields' => array(
                    array(
                        'id'            => 'opt-import-export',
                        'type'          => 'import_export',
                        'title'         => 'Import Export',
                        'subtitle'      => 'Save and restore your Redux options',
                        'full_width'    => false,
                    ),
                ),
            );
        }

        public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('Theme Information 1', 'themestudio'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'themestudio')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Theme Information 2', 'themestudio'),
                'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'themestudio')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'themestudio');
        }

        /**
         * All the possible arguments for Redux.
         * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name' => 'ariva', // This is where your data is stored in the database and also becomes your global variable name.
                'display_name' => $theme->get('Name'), // Name that appears at the top of your panel
                'display_version' => $theme->get('Version'), // Version that appears at the top of your panel
                'menu_type' => 'submenu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu' => false, // Show the sections below the admin menu item or not
                'menu_title' => __('ARIVA Options', 'themestudio'),
                'page_title' => __('ARIVA Options', 'themestudio'),
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => 'AIzaSyA8xiYs49m_QkQ4M6gA-jtwYjNuQEVGJqo', // Must be defined to add google fonts to the typography module
                //'async_typography' => true, // Use a asynchronous font on the front end or font string
                //'admin_bar' => false, // Show the panel pages on the admin bar
                'global_variable' => 'ts_ariva', // Set a different name for your global variable other than the opt_name
                'dev_mode' => false, // Show the time the page took to load, etc
                'customizer' => true, // Enable basic customizer support
                // OPTIONAL -> Give you extra features
                'page_priority' => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent' => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions' => 'manage_options', // Permissions needed to access the options panel.
                'menu_icon' => '', // Specify a custom URL to an icon
                'last_tab' => '', // Force your panel to always open to a specific tab (by id)
                'page_icon' => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
                'page_slug' => 'ariva_options', // Page slug used to denote the panel
                'save_defaults' => true, // On load save the defaults to DB before user clicks save or not
                'default_show' => false, // If true, shows the default value next to each field that is not the default value.
                'default_mark' => '', // What to print by the field's title if the value shown is default. Suggested: *
                // CAREFUL -> These options are for adarivaced use only
                'transient_time' => 60 * MINUTE_IN_SECONDS,
                'output' => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag' => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                //'domain'              => 'redux-framework', // Translation domain key. Don't change this unless you want to retranslate all of Redux.
                //'footer_credit'       => '', // Disable the footer credit of Redux. Please leave if you can help it.
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database' => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export' => true, // REMOVE
                'system_info' => false, // REMOVE
                'help_tabs' => array(),
                'help_sidebar' => '', // __( '', $this->args['domain'] );
                'hints' => array(
                    'icon'              => 'icon-question-sign',
                    'icon_position'     => 'right',
                    'icon_color'        => 'lightgray',
                    'icon_size'         => 'normal',

                    'tip_style'         => array(
                        'color'     => 'light',
                        'shadow'    => true,
                        'rounded'   => false,
                        'style'     => '',
                    ),
                    'tip_position'      => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect' => array(
                        'show' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'mouseover',
                        ),
                        'hide' => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );

            $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/themestudionet',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/themestudionet',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );

            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                // $this->args['intro_text'] = sprintf(__('<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'themestudio'), $v);
            } else {
                // $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'themestudio');
            }

            // Add content after the form.
            // $this->args['footer_text'] = __('<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'themestudio');
        }

    }

    new Redux_Framework_sample_config();
}


/**
 *Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):

    function redux_my_custom_field($field, $value) {
        print_r($field);
        print_r($value);
    }

endif;

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;