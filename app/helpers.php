<?php

if (!function_exists('notifyUser')) {
    function notifyUser($bg, $message)
    {
        $data = [
            'bg' => $bg,
            'message' => $message,
        ];

        session()->flash('toast', $data);
    }
}