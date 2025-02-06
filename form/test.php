<?php
/*
Plugin Name: Simple Contact Form
Description: A simple contact form plugin.
Version: 1.0
Author: Your Name
*/




function add_shortcode(){



    if(isset($_POST['scf_submit'])){


        $to = get_option($_POST['admin_email']);
        $subject = 'New Contact Form Message';
        $message = 'Name: ' . sanitize_text_field($_POST['name']) . "\n\n" .
                   'Email: ' . sanitize_email($_POST['email']) . "\n\n" .
                   'Message: ' . sanitize_textarea_field($_POST['message']);
        $headers = array('Content-Type: text/plain; charset=UTF-8');





        wp_mail($to,$subject,$message,$header);

         // Success message
        echo '<p>Thank you! Your message has been sent.</p>';


    }








    ob_start();

    ?>





    <form method="post">
        <label>Name</label>
        <input type="text" name="name" required>
        
        <label>Email</label>
        <input type="email" name="email" required>
        
        <label>Message</label>
        <textarea name="message" required></textarea>
        
        <button type="submit" name="scf_submit">Send Message</button>
    </form>



    <?php 

    return ob_get_clean();



}
add_shortcode('add_shortcode','add_shortcode');