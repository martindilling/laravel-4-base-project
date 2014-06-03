<?php namespace MDH\Base\Controllers;

use Illuminate\Routing\Controller;
use Event;

abstract class BaseController extends Controller
{
    /**
     * Create a new BaseController instance.
     */
    public function __construct()
    {
        // Make sure our posts are secure
        $this->beforeFilter('csrf', [ 'on' => ['post', 'put', 'patch', 'delete'] ]);

        // Before event for Clockwork
        $this->beforeFilter(function()
        {
            Event::fire('clockwork.controller.start');
        });

        // After event for Clockwork
        $this->afterFilter(function()
        {
            Event::fire('clockwork.controller.end');
        });
    }
    
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = View::make($this->layout);
        }
    }

}
