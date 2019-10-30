<?php
/**
 * This code retrieves course data from an external API and displays it in the user's
 * My Account area. A merchant has noticed that there's a delay when loading the page.
 * 
 * == What changes would you suggest to reduce or remove that delay? ==
 */
function add_my_courses_section() {
    global $current_user;

    $api_user_id = get_user_meta( $current_user->ID, '_external_api_user_id', true );

    if ( !$api_user_id ) {
        return;
    }

    /**
     * I have removed the $this reference because this is not a class and create only one $api object
     * despite two of then as in the previous code
     */
    $courses  = $api->get_courses_assigned_to_user( $api_user_id );
    $sso_link = $api->get_sso_link( $api_user_id );

    ?>
    <h2 style="margin-top: 40px;"><?php print __( 'My Courses', 'text-domain' ); ?></h2>
    <table>
        <thead><tr>
            <th><?php echo __( 'Course Code', 'text-domain' ); ?></th>
            <th><?php echo __( 'Course Title', 'text-domain' ); ?></th>
            <th><?php echo __( 'Completion', 'text-domain' ); ?></th>
            <th><?php echo __( 'Date Completed', 'text-domain' ); ?></th>
        </tr></thead>
        <tbody>
        <?php
        foreach( $courses as $course ) :
            ?><tr>
            <td><?php echo __( $course['Code'] ); ?></td>
            <td><?php echo __( $course['Name'] ); ?></td>
            <td><?php echo __( $course['PercentageComplete'] ); ?> &#37;</td>
            <td><?php echo __( $course['DateCompleted'] ); ?></td>
        <?php endforeach;
        ?>
        </tbody>
    </table>
    <p><a href="<?php echo $sso_link; ?>" target="_blank" class="button <?php echo $_GET['active_course']; ?>"><?php echo __( 'Course Login', 'text-domain' ); ?></a></p>

    <?php
}