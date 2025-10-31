<?php

/**
 * Contact form handler for Carteon website
 */

// Initialize the application
require_once '../init.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $name = isset($_POST['name']) ? sanitize_input($_POST['name']) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $subject = isset($_POST['subject']) ? sanitize_input($_POST['subject']) : '';
    $message = isset($_POST['message']) ? sanitize_input($_POST['message']) : '';

    // Validate required fields
    $errors = array();

    if (empty($name)) {
        $errors[] = "Name is required";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($subject)) {
        $errors[] = "Subject is required";
    }

    if (empty($message)) {
        $errors[] = "Message is required";
    }

    // If no errors, process the form
    if (empty($errors)) {
        // In a real application, you would:
        // 1. Save to database
        // 2. Send email notification
        // 3. Log the submission

        // For now, we'll just simulate success
        $success = true;

        if ($success) {
            // Redirect with success message
            $_SESSION['contact_success'] = "Thank you for your message. We'll get back to you soon!";
            redirect('../contact-success.php');
        } else {
            // Redirect with error message
            $_SESSION['contact_error'] = "Sorry, there was an error sending your message. Please try again.";
            redirect('../contact.php');
        }
    } else {
        // Store errors in session and redirect back to form
        $_SESSION['contact_errors'] = $errors;
        $_SESSION['contact_data'] = array(
            'name' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        );
        redirect('../contact.php');
    }
} else {
    // If not a POST request, redirect to contact page
    redirect('../contact.php');
}
