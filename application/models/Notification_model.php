<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_model extends CI_Model {

    public function getNotifications() {
        // Replace with your own implementation to fetch notifications from the database
        $notifications = $this->db->get('notifications')->result_array();

        return $notifications;
    }

}
