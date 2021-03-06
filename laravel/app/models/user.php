<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class user extends Eloquent implements UserInterface, RemindableInterface {

    protected $table = 'user';
public $timestamps = false;

/**
 * Get the unique identifier for the user.
 *
 * @return mixed
 */
public function getAuthIdentifier()
{
    return $this->getKey();
}

/**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
    return $this->password;
}

/**
 * Get the e-mail address where password reminders are sent.
 *
 * @return string
 */
public function getReminderEmail()
{
    return $this->email;
}

// Add your other methods her


public function getRememberToken()
{
    return $this->remember_token;
}

public function setRememberToken($value)
{
    $this->remember_token = $value;
}

public function getRememberTokenName()
{
    return 'remember_token';
}

	public function setPasswordAttribute($plainPassword)
{
$this->attributes['password'] = Hash::make($plainPassword);
}
 






}


