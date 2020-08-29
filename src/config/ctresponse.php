<?php

/*
 *
   Samples, you are free to handler this according your application,
   Uncomment the constants to test..
 *
*/

//const DEFAULT_SUCCESS_ROUTE = '/';
//const DEFAULT_FAIL_ROUTE = '/';

//const DEFAULT_SUCCESS_ICON = 'success-icon';
//const DEFAULT_FAIL_ICON = 'fail-icon';

//const DEFAULT_SUCCESS_TITLE_MESSAGE = 'Success!';
//const DEFAULT_SUCCESS_SUB_TITLE_MESSAGE = 'Completed Action!';

//const DEFAULT_FAIL_TITLE_MESSAGE = 'Fail!';
//const DEFAULT_FAIL_SUB_TITLE_MESSAGE = 'Error during the execution!';

return [

    'http' => [
        'success_result' => [
            'login' => [
                'redirect_to' => 'auth.login',
//            'message_title' => DEFAULT_SUCCESS_TITLE_MESSAGE,
//            'message_sub_title' => DEFAULT_SUCCESS_SUB_TITLE_MESSAGE,
//            'icon' => DEFAULT_SUCCESS_ICON,
            ]
        ],

        /*  Retrieving the key value using trans()
         *  trans(config('response.fail_result.login.message_title'))
         */
        'fail_result' => [
            'login' => [
                'redirect_to' => 'auth.login',
                'message_title' => 'path.foo.bar',
                'message_sub_title' => 'path.foo.bar',
                'icon' => 'path.foo.bar',
            ]
        ],
    ],
    'json' => [
        'success_result' => [
            'login' => [
                'redirect_to' => 'auth.login',
//            'message_title' => DEFAULT_SUCCESS_TITLE_MESSAGE,
//            'message_sub_title' => DEFAULT_SUCCESS_SUB_TITLE_MESSAGE,
//            'icon' => DEFAULT_SUCCESS_ICON,
            ]
        ],

        /*  Retrieving the key value using trans()
         *  trans(config('response.fail_result.login.message_title'))
         */
        'fail_result' => [
            'login' => [
                'redirect_to' => 'auth.login',
                'message_title' => 'path.foo.bar',
                'message_sub_title' => 'path.foo.bar',
                'icon' => 'path.foo.bar',
            ]
        ],
    ],
];
