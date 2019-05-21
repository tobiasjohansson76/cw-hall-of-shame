<?php
$token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MjM2MSwiaWRlbiI6IjM5NTU3ODQwOTc1NDk1MTY4MSIsIm1kIjp7fSwidHMiOjE1NTA1MjE0NjUxOTh9.EUuEF723Yw-s_IKqWfXCCxlQYbP7G3__Atn4GxKr6WA";
$opts = [
        "http" => [
                "header" => "auth:" . $token
        ]
];
$context = stream_context_create($opts);
$contents = file_get_contents("https://api.royaleapi.com/clan/P9GLVCP9/warlog",true, $context);
//$contents = utf8_encode($contents);
$warlogresults = json_decode($contents);
?>