<?php namespace MDH\Base\Controllers\Admin;

use Illuminate\Events\Dispatcher;
use Input;
use MDH\Base\Exceptions\FormValidationException;
use MDH\Base\Sanitizers\UserSanitizer;
use MDH\Base\Validators\CreateUserValidator;
use MDH\Base\Validators\UpdateUserValidator;
use MDH\Base\Repositories\UserRepositoryInterface;
use Notification;
use Paginator;
use Redirect;
use View;

class DashboardController extends BaseAdminController {

    /**
     * Category Repository
     *
     * @var \MDH\Base\Repositories\UserRepositoryInterface
     */
    protected $users;

    /**
     * @param \MDH\Base\Repositories\UserRepositoryInterface  $users
     */
    function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index()
    {
        $user_count = $this->users->count();

        return View::make('admin.dashboard.index', compact('user_count'));
    }

}
