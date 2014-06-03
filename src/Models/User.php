<?php namespace MDH\Base\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface
{
    use UserTrait;
    use RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Presenter to contain data logic
     *
     * @var string
     */
    protected $presenter = 'MDH\Base\Presenters\UserPresenter';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Properties allowed for mass-assignment.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];



    /*********************************************
     * Relationships
     *********************************************/


}
