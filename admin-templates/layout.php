<div class="wrap">

<h2>ddRem Theme Layout</h2>

<form method="post" action="options.php">

    <?php settings_fields( 'ddrem-layout-group' ); ?>
    <h3>Global</h3>
    <table class="form-table">
    
        <tr valign="top">
        <th scope="row">Width</th>
        <td><input type="text" name="ddrem_layout_global_width" value="<?php echo get_option('ddrem_layout_global_width'); ?>" /></td>
        </tr>
        
    </table>

    <h3>Header Image</h3>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">Show?</th>
            <td>
                <?php
                    if(get_option('ddrem_layout_header_image_show')){
                        $checked = "checked=\"checked\"";
                    }else{
                        $checked = "";
                    }
                ?>
                <input type="checkbox" name="ddrem_layout_header_image_show" id="ddrem_layout_header_image_show" value="true" <?php echo $checked; ?> />
                <label for="ddrem_layout_header_image_show"><?php echo __('Show a header image?','ddrem'); ?></label>
            </td>
        </tr>    
        <tr valign="top">
        <th scope="row">Width</th>
        <td><input type="text" name="ddrem_layout_header_image_width" value="<?php echo get_option('ddrem_layout_header_image_width'); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Height</th>
        <td><input type="text" name="ddrem_layout_header_image_height" value="<?php echo get_option('ddrem_layout_header_image_height'); ?>" /></td>
        </tr>
        
    </table>

    <h3>Sidebar</h3>
    <table class="form-table">
    
        <tr valign="top">
        <th scope="row">Location</th>
        <td>
        <select name="ddrem_layout_sidebar_location">
            <?php foreach ( array('right', 'left', 'none') as $location ) { ?>
            <option value="<?php echo $location ?>" <?php if ( $location == get_option('ddrem_layout_sidebar_location') ) { echo ' SELECTED="SELECTED"'; } ?>><?php echo $location; ?></option>
            <?php } ?>
        </select>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row">Width</th>
        <td><input type="text" name="ddrem_layout_sidebar_width" value="<?php echo get_option('ddrem_layout_sidebar_width'); ?>" /></td>
        </tr>
        
    </table>
    
    <h3>Additional Styling</h3>
    <table class="form-table">

        <tr valign="top">
        <th scope="row">Base Theme</th>
        <td>
        <select name="ddrem_layout_css_theme">
            <option value="">[custom]</option>
            <?php foreach ( array(
                'template|css/theme/rounded.css' => 'ddRem Rounded',
                'template|css/theme/iaous.css' => 'ddRem iaous',
            ) as $file => $name ) : ?>
            <option value="<?php echo $file; ?>" <?php if ( $file == get_option('ddrem_layout_css_theme') ) { echo ' SELECTED="SELECTED"'; } ?>><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        </td>
        </tr>

        <tr valign="top">
        <th scope="row">Navigation</th>
        <td>
        <select name="ddrem_layout_css_navigation">
            <option value="">[custom]</option>
            <?php foreach ( array(
                'template|css/navigation/twentyten.css' => 'TwentyTen Classic Navigation',
                'template|css/navigation/ddrem.css' => 'ddRem Simple Navigation',
            ) as $file => $name ) : ?>
            <option value="<?php echo $file; ?>" <?php if ( $file == get_option('ddrem_layout_css_navigation') ) { echo ' SELECTED="SELECTED"'; } ?>><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        </td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Comments</th>
        <td>
        <select name="ddrem_layout_css_comments">
            <option value="">[custom]</option>
            <?php foreach ( array(
                'template|css/comments/twentyten.css' => 'TwentyTen Classic Comments',
            ) as $file => $name ) : ?>
            <option value="<?php echo $file; ?>" <?php if ( $file == get_option('ddrem_layout_css_comments') ) { echo ' SELECTED="SELECTED"'; } ?>><?php echo $name; ?></option>
            <?php endforeach; ?>
        </select>
        </td>
        </tr>
        
    </table>
        
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>

</div>
