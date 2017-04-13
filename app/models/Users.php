<?php

use Phalcon\Mvc\Model,
    Phalcon\Mvc\Model\Validator\Uniqueness;
use Phalcon\Mvc\Model\Behavior\Timestampable;

class users extends Model
{ 
	public $user_id;

    public $firstname;

    public $lastname;

    public $email;

    public $birthdate;

    public $phone;

    public $mobile;

    public $address;

    public $zipcode;

    public $city;

    public $password;

    public $lvl;

    // public function initialize(){
    //     $this->addBehavior( 
    //         new Timestampable(
    //             [
    //                 "beforeCreate" => [
    //                 "field" => "birthdate",
    //                 "format" => "d-m-Y",
    //                 ] 
    //             ]
    //         )
    //     );
    // }


    public function beforeCreate()
    {
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function beforeUpdate()
    {
        $this->updated_at = date('Y-m-d H:i:s');
    }


    public function validation()
    {
        $this->validate(new Uniqueness(
            array(
                    "field" => "email",
                    "message" => "the email is already registered"
                )
            ));

        return $this->validationHasFailed() != true;
    }
}