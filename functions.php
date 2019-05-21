<?php

    function array_push_assoc($array, $key, $value) {
        if (array_key_exists($key,$array)) {
            $array[$key] += $value;
        } else {
            $array[$key] = $value;
        }
        return $array;
    }

?>