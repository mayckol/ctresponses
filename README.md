laravel custom responses


## This will help you to control the http responses, simple to use, improvements are welcome.

#### keep the results of your project requests in a single configuration file!

##Usage

Add service provider in config/app <strong>\Mayckol\CtResponse\CtResponseServiceProvider::class</strong>

Publish conf
php artisan vendor:publish
and select the correct option for (<strong>Provider: Mayckol\CtResponse\CtResponseServiceProvider</strong>)

You are free to choose keys and values!

Sample
**responses.php**
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
messages.php

```
return [
    'login_fail' => [
        'title' => 'Warning!',
        'content' => 'Authenticate fails',
    ]
];
```
web.php simple sample
```
Route::get('/', function () {
//    return view('welcome');
    $jsonResponse = app(\Mayckol\CtResponse\app\Models\CtResponseJson::class);
    $factoryResponse = app(\Mayckol\CtResponse\app\CtResponseFactory::class);
    return $factoryResponse::build($jsonResponse, config('response.json.fail_result.login'), ['status' => 200]);
});

````
inside your layout (blade), remember... all keys declared inside 'message' key in array will be translate
you don't need to care with this, just make sure the key exists in the message file. 
ex:
messages.php
```
return [
    'login_fail' => [
        'title' => 'Warning!',
        'content' => 'Authenticate fails',
    ]
];
```
result (blade.php)
```
session()->all()

array:8 [▼
  "_token" => "5EZDfiHPFILihzS1L8HPV3wKCckRz5te2EOGsKDK"
  "_previous" => array:1 [▶]
  "_flash" => array:2 [▶]
  "redirect_to" => "admin.master.foo.index"
  "message" => array:2 [▼
    "title" => "Warning!"
    "content" => "Authenticate fails"
  ]
  "icon" => "fa-check-square-o"
  "type" => "success"
]

@if (session('message'))
helper.toast({
    message: '{{ session('message')['content'] }}',
    type: '{{ session('type') }}',
    icon: '{{ session('icon') }}',
    title: '{{ session('message')['title'] }}'
}, 15000);
@endif
```
And finally you can use the return messages stored in session to handler your js, ex: modalShow()... etc...
##Any questions, bugs... please contact me
mayckoll@live.com
