<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Confide\ConfideEloquentRepository;

class User extends ConfideUser {
	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'users';

	/**
     * Ardent validation rules
     *
     * @var array
     */
    public static $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|between:4,30|confirmed',
        'password_confirmation' => 'between:4,30',
    );

    /**
     * Rules for when updating a user.
     *
     * @var array
     */
    protected $updateRules = array(
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'between:4,30|confirmed',
        'password_confirmation' => 'between:4,30',
    );

	public function currentUser()
    {
        return (new Confide(new ConfideEloquentRepository()))->user();
    }

}