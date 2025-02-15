<?php

require '../config/function.php';

if (isset($_POST['login'])) {

    $userDetails = validate($_POST['user_details']);
    $password = validate($_POST['password']);

    if (empty($userDetails) || empty($password)) {
        redirect(BASE_URL . '/user/login', 'Please fill the required fields!', 'info');
        exit();
    }

    $result = getUser('users', $userDetails);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();


        if (password_verify($password, $row['hash_password'])) {
            
            $_SESSION['loggedIn'] = true;
            $_SESSION['loggedInUser'] = [
                'user_id' => $row['id'],
                'role' => $row['role'],
            ];

            if ($row['role'] === 'admin' || $row['role'] === 'staff') {
    
                redirect(BASE_URL . '/admin/dashboard', 'Login successful!', 'success');

            } else {   

                redirect(BASE_URL . '/user/dashboard', 'Login successful!', 'success');
            }

        } else {
            redirect(BASE_URL . '/user/login', 'Incorrect credentials', 'error');
        }
    } else {
        redirect(BASE_URL . '/user/login', 'User not found!', 'error');
    }
}
?>
