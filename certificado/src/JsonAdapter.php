<?php 

class JsonAdapter implements Adapter {
    
    private $file;

    public function __construct($file) {
        $this->file = json_decode(file_get_contents($file));
    }

    public function findAttendee($email, $id_event) {
        
        $result = array();

        foreach ($this->file->event as $event) {

            if ($event->id == $id_event) {

                foreach ($event->attendee as $attendee) {

                    if ($attendee->email == $email) {

                        $result[] = (array) $attendee;

                    }

                } 
            } 
            
        } 

        return $result;
    }

    public function findEvent($id) 
    {
        
        $result = array();

        foreach ($this->file->event as $event) 
        {

            if ($event->id == $id) {
                // var_dump($event);die;
                $result = (array) $event;

            } 

        } 

        return $result;
    }

    public function getAllEvent() 
    {
        
        $result = array();

        foreach ($this->file->event as $event) 
        {

            $result[] = (array) $event;

        } 

        return $result;
    }

}