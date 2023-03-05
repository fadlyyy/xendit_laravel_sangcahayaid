<?php

return [
    'key_auth' => base64_encode(env('SECRET_KEY_XENDIT') . ':')
];
