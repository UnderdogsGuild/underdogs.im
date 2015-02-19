<?php namespace App\Exceptions;


use App\User;
use Exception;

class CreateShoutException extends Exception {

    private $user;
    private $response;
    private $attempted_message;


    /**
     * @param string $response
     * @param User $user
     * @param Exception $attempted_message
     */
    public function __construct($response, User $user, $attempted_message) {
        $this->user = $user;
        $this->response = $response;
        $this->attempted_message = $attempted_message;
    }

    public function __toString() {
        return __CLASS__ . ": Shout message failed. From: " . $this->user()->username . ". Message: " . $this->attempted_message . " Response was: " . $this->response;
    }

    final public function getUser() {
        return $this->user;
    }

    final public function getResponse() {
        return $this->response;
    }

    final public function getAttemptedMessage() {
        return $this->attempted_message;
    }
}