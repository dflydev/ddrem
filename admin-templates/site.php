<div class="wrap">

<h2>ddRem Theme Site Information</h2>

<form method="post" action="options.php">

    <?php settings_fields( 'ddrem-site-group' ); ?>
    <h3>Copyright</h3>
    <table class="form-table">
    
        <tr valign="top">
        <th scope="row">Name</th>
        <td><input type="text" name="ddrem_site_copyright_name" value="<?php echo get_option('ddrem_site_copyright_name'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">URL</th>
        <td><input type="text" name="ddrem_site_copyright_url" value="<?php echo get_option('ddrem_site_copyright_url'); ?>" /></td>
        </tr>

        <tr valign="top">
        <th scope="row">Date</th>
        <td><input type="text" name="ddrem_site_copyright_date" value="<?php echo get_option('ddrem_site_copyright_date'); ?>" /></td>
        </tr>
        
    </table>
        
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>

</div>