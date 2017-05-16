<?php 

interface Adapter {

	public function findAttendee($email, $id_event);
	public function findEvent($id);
	public function getAllEvent();
	
}