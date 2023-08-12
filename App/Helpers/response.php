<?php

class ResponseHelper
{
    public static function jsonResponse($status, $title, $message, $redirect = null)
    {
        $data = ['status' => $status, 'title' => $title, 'message' => $message];

        if ($redirect != null)
            $data['redirect'] = $redirect;

        echo json_encode($data);
        exit();
    }

    public static function successResponse($title = 'Successful', $message = 'Transaction successful.', $redirect = null)
    {
        $data = ['status' => 'success', 'title' => $title, 'message' => $message];

        if ($redirect != null)
            $data['redirect'] = $redirect;

        echo json_encode($data);
        exit();
    }

    public static function errorResponse($title = 'Ops.. Attention!', $message = 'Something\'s wrong.', $redirect = null)
    {
        $data = ['status' => 'error', 'title' => $title, 'message' => $message];

        if ($redirect != null)
            $data['redirect'] = $redirect;

        echo json_encode($data);
        exit();
    }

    public static function warningResponse($title = 'Warning!', $message = 'Please try again.', $redirect = null)
    {
        $data = ['status' => 'warning', 'title' => $title, 'message' => $message];

        if ($redirect != null)
            $data['redirect'] = $redirect;

        echo json_encode($data);
        exit();
    }

}


?>