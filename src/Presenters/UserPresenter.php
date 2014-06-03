<?php namespace MDH\Base\Presenters;

class UserPresenter extends BasePresenter
{
    public function fullName()
    {
        return $this->name;
    }

    public function created()
    {
        return $this->created_at->toFormattedDateString();
    }
}
