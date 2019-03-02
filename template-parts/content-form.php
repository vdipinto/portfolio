<?php
/**
 * Template part for displaying the contact form 
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('contact-form'); ?>>
  <form action="http://localhost:8888/portfolio/contact/" method="post">
    <label for="first-name">First Name</label>
    <input type="text" id="first-name" name="first-name" maxlength="60" required>

    <label for="last-name">Last Name</label>
    <input type="text" id="last-name" name="last-name" maxlength="60" required>

    <label for="contact-email">Email</label>
    <input type="text" id="contact-email" name="contact-email" maxlength="60" required>

    <label for="contact-message">Message</label>
    <input type="text" id="contact-message" name="contact-message" maxlength="1000" required>

    <input type="submit" id="submit-contact-form" name="submit-contact-form" value="Submit">
  </form>
</article><!-- #post-<?php the_ID(); ?> -->

<?php

function send_email() {
    echo "hello ".$_POST["first-name"];
    
    $first_name = filter_var($_POST["first-name"], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["last-name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["contact-email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["contact-message"], FILTER_SANITIZE_STRING);

    $dbc = mysqli_connect('localhost', 'root', 'root', 'inbox-portfolio')
    or die('Error connecting to MySQL server.');

  $query = "INSERT INTO message (first_name, last_name, email_addr, message) " .
    "VALUES ('$first_name', '$last_name', '$email', '$message')";

  $result = mysqli_query($dbc, $query)
    or die('Error querying database.');

  mysqli_close($dbc);

  mail('vitodipinto@outlook.com', 'new message from portfolio', "$message<br><br>From: $first_name $last_name ($email)" , 'From:' . 'vitodipinto@outlook.com');
}

if(isset($_POST['submit-contact-form'])) {
  send_email();
}

?>