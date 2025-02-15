<?php

function route($request) {
    $routes = [
     
        // Public Routes

        '/user/login' => [
            'title' => 'Log in',
            'files' => [

                'auth/includes/header.php',
                'auth/login.php',
                'auth/includes/footer.php',
                
            ],
        ],

        '/user/signup' => [
            'title' => 'Sign up',
            'files' => [

                'auth/includes/header.php',
                'auth/signup.php',
                'auth/includes/footer.php',
                
            ],
        ],

        '/user/verification' => [
            'title' => 'Verification',
            'files' => [

                'auth/includes/header.php',
                'auth/verify.php',
                'auth/includes/footer.php',
                
            ],
        ],

        '/user/registration' => [
            'title' => 'Create Your Account',
            'files' => [

                'auth/includes/header.php',
                'auth/register.php',
                'auth/includes/footer.php',
                
            ],
        ],

        '/user/logout' => [
            'files' => [

                'logout.php',
                
            ],
        ],

        // Resident Routes

        '/user/dashboard' => [
            'title' => 'Dashboard',
            'files' => [

                'resident/includes/header.php',
                'resident/user_dashboard.php',
                'resident/includes/footer.php',
                
            ],
        ],

        '/user/requests' => [
            'title' => 'Requests',
            'files' => [

                'resident/includes/header.php',
                'resident/user_requests.php',
                'resident/includes/footer.php',
                
            ],
        ],

        '/account/profile' => [
            'title' => 'Account Profile',
            'files' => [

                'resident/includes/header.php',
                'resident/user_profile.php',
                'resident/includes/footer.php',
                
            ],
        ],

        '/account/security' => [
            'title' => 'Account Security',
            'files' => [

                'resident/includes/header.php',
                'resident/user_security.php',
                'resident/includes/footer.php',
                
            ],
        ],

        '/user/submit_request' => [
            'title' => 'Submit A Request',
            'files' => [

                'resident/includes/header.php',
                'resident/user_submit_request.php',
                'resident/includes/footer.php',
                
            ],
        ],


        // Admin & Barangay Staff Routes

        '/admin/dashboard' => [
            'title' => 'Admin Dashboard',
            'files' => [

                'admin/includes/header.php',
                'admin/admin_dashboard.php',
                'admin/includes/footer.php',
                
            ],
        ],

        '/admin/list-of-accounts/residents' => [
            'title' => 'List of Residents',
            'files' => [

                'admin/includes/header.php',
                'admin/admin_list_of_residents.php',
                'admin/includes/footer.php',
                
            ],
        ],

        '/admin/requested_documents' => [
            'title' => 'Requested Documents',
            'files' => [

                'admin/includes/header.php',
                'admin/admin_all_requests.php',
                'admin/includes/footer.php',
                
            ],
        ],




    ];

    if (array_key_exists($request, $routes)) {
        $route = $routes[$request];

        if (isset($route['title'])) {
            $GLOBALS['title'] = $route['title']; 
        }

        foreach ($route['files'] as $file) {
            if (!file_exists($file)) {
                include '404.html'; 
                return;
            }
            include $file;
        }
    } else {
        include '404.html'; 
    }
}

?>
