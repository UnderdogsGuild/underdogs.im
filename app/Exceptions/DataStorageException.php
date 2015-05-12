<?php namespace App\Exceptions;


use App\User;
use Exception;

class DataStorageException extends Exception {

    private $user;
    private $model;
    private $attempted_message;


    /**
     * @param string $response
     * @param User $user
     * @param Exception $attempted_message
     */
    public function __construct(User $user, $model) {
        $this->user = $user;
        $this->model = $model;
    }

    public function __toString() {
        return __CLASS__ . ": " . $this->user->username . ". An unknown error occurred while saving this model.";
    }

    final public function getUser() {
        return $this->user;
    }

    final public function getModel() {
        return $this->model;
    }
}