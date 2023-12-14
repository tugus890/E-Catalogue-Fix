<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load model, library, helper, etc.
        $this->load->model('notification_model');
    }

    public function getNotifications() {
        // Get notifications from the model (replace with your own implementation)
        $notifications = $this->notification_model->getNotifications();

        // Return notifications as JSON
        echo json_encode($notifications);
    }

}
