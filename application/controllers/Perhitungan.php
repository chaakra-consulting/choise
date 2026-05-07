<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Perhitungan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
    }

    function index()
    {
        for ($i = 1; $i < 38; $i++) {
            echo "user" . $i . "<br>";
        }

        echo md5("123");
    }
}
