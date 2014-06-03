<?php namespace MDH\Base\Models;

use Illuminate\Database\Eloquent\Model;
use MDH\Base\Services\Presenter\PresentableTrait;

abstract class BaseModel extends Model
{
    use PresentableTrait;

}
