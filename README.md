laravel custom responses


## This will help you to control the http responses, simple to use, improvements are welcome.

#### keep the results of your project requests in a single configuration file!

##Usage

Add service provider in config/app

\Mayckol\CtResponse\CtResponseServiceProvider::class

Publish config
php artisan vendor:publish
and select the correct option for (Provider: Mayckol\CtResponse\CtResponseServiceProvider)

You are free to choose keys and values!

Sample
```
<?php


const DEFAULT_SUCCESS_ROUTE = '/';
const DEFAULT_FAIL_ROUTE = '/';

const DEFAULT_SUCCESS_ICON = 'success-icon';
const DEFAULT_FAIL_ICON = 'fail-icon';
return [

    'http' => [
        'success_result' => [
            'login' => [
                'redirect_to' => 'auth.login',
            'message_title' => DEFAULT_SUCCESS_TITLE_MESSAGE,
            'message_sub_title' => DEFAULT_SUCCESS_SUB_TITLE_MESSAGE,
            'icon' => DEFAULT_SUCCESS_ICON,
            ]
        ],

        /*  Retrieving the key value using trans()
         *  trans(config('response.fail_result.login.message_title'))
         */
        'fail_result' => [
            'login' => [
                'redirect_to' => 'test',
                'message_title' => 'path.foo.bar',
                'message_sub_title' => 'path.foo.bar',
                'icon' => 'path.foo.bar',
            ]
        ],
    ],

```
```

Route::get('/', function () {
//    return view('welcome');
    $jsonResponse = app(\Mayckol\CtResponse\app\Models\CtResponseJson::class);
    $factoryResponse = app(\Mayckol\CtResponse\app\CtResponseFactory::class);
    return $factoryResponse::build($jsonResponse, config('response.json.fail_result.login'), ['status' => 200]);
});

````
