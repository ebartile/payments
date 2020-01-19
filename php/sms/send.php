<?php
require_once "blackbox.php";
include_once '../../php/dbconnect.php';
include_once '../../php/functions.php';
	# Setup API credentials
	$api_key = 'afe905d690b4697ca616a596c2a0e9a5'; # Check under Settings->API Keys in Blackbox
	$api_signature = 'ezmEpgmhs0a/eHEyY0cMYjrRJUo0XecMdUo4QHOm29iaysyWzU/MUtP2O7kub3QvpdqCHXckH+hsBLXU1MX6LyznBG7Ij4YqpIimjzkWCOR1CptTgscv+LQevRQu/nqGuheCdgrVVXlHiCJ0RPHRtWnu+WipCbVlOyfMq5OC7Pc='; # Check under Manage Settings->API Keys in Blackbox
	//$buyer_recipients = $recipient;
	$sms = 'TEST';
	$phone ='254706745202';

	$message3 =  $sms;
	$recipient = $phone;
	$blackbox = new Blackbox($api_key, $api_signature); # Instantiate API library
	$blackbox->queue_sms("$recipient", "$message3", "INFOALERT", ""); # Replace example with valid recipient, message, shortcode, keyword and scheduled datetime if required in format ("YYYY-MM-DD HH:mm:ss")
	$blackbox->send_sms(); # Initiate API call to send messages
?>