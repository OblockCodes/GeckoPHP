<?php

class Signup
{
    use Controller;

    public function index()
    {
        $data = [];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new User;
            if ($user->validate($_POST)) {
                // Insert the user into the database
                $user->insert($_POST);

                // Get the user details after insertion (assuming your insert method returns the user object)
                $newUser = $user->first(['email' => $_POST['email']]); // assuming the email is unique

                // Set the user data in the session to log them in
                $_SESSION['USER'] = $newUser;

                // Redirect to the homepage with the user logged in
                redirect('home');
            } else {
                // Handle validation errors if any
                $data['errors'] = $user->errors;
            }
        }

        // Render the signup view with any errors if they exist
        $this->view('signup', $data);
    }
}
