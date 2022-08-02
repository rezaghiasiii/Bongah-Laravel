<?php

namespace App\Http;

class Flash
{
    public function create($title,$message,$level,$key = 'flash_message')
    {
        return session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }
    public function info($title="Info", $message="Info")
    {
        return $this->create($title,$message,'info');
    }

    public function success($title = "Success", $message = "Successfully!")
    {
        return $this->create($title,$message,'success');
    }

    public function warning($title = "Warning", $message = "Warning")
    {
        return $this->create($title,$message,'warning');
    }

    public function error($title = "Error", $message = "Error")
    {
        return $this->create($title,$message,'error');
    }

    public function overlay($title = "Okay", $message = "Successfully",$level='success')
    {
        return $this->create($title,$message,$level,'flash_message_overlay');
    }

}
