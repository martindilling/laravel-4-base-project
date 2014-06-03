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
use Str;
use View;

class UsersController extends BaseAdminController {

    /**
     * Category Repository
     *
     * @var \MDH\Base\Repositories\UserRepositoryInterface
     */
    protected $users;

    /**
     * @var \MDH\Base\Sanitizers\UserSanitizer
     */
    protected $userSanitizer;

    /**
     * @var \MDH\Base\Validators\CreateUserValidator
     */
    protected $createUserValidator;

    /**
     * @var \MDH\Base\Validators\UpdateUserValidator
     */
    private $updateUserValidator;

    /**
     * @var \Illuminate\Events\Dispatcher
     */
    protected $events;

    /**
     * @param \MDH\Base\Repositories\UserRepositoryInterface  $users
     * @param \MDH\Base\Sanitizers\UserSanitizer              $userSanitizer
     * @param \MDH\Base\Validators\CreateUserValidator        $loginValidator
     * @param \MDH\Base\Validators\UpdateUserValidator        $updateUserValidator
     * @param \Illuminate\Events\Dispatcher                   $events
     */
    function __construct(
        UserRepositoryInterface $users,
        UserSanitizer $userSanitizer,
        CreateUserValidator $loginValidator,
        UpdateUserValidator $updateUserValidator,
        Dispatcher $events
    ){
        $this->users                 = $users;
        $this->userSanitizer         = $userSanitizer;
        $this->createUserValidator   = $loginValidator;
        $this->updateUserValidator   = $updateUserValidator;
        $this->events                = $events;
    }

    /**
     * Display a listing of categories
     *
     * @return Response
     */
    public function index()
    {
        // Get all users, and paginate in the data table
        $users = $this->users->all();

        return View::make('admin.users.index', compact('users'));

        // This if you wanted to get the paginated result from the database
        $page = Input::get('page', 1);
        $perPage = 8;

        $data = $this->users
            ->orderCreatedDesc()
            ->getByPage($page, $perPage, []);

        $paginator = Paginator::make($data->items, $data->totalItems, $perPage);

        $users = $paginator->getCollection();
        $pagination = (string) $paginator->links();

        return View::make('admin.users.index', compact('users', 'pagination'));
    }

    /**
     * Show the form for creating a new category
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.users.create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();

        $input = $this->userSanitizer->sanitize($input);

        $password = Str::random(8);
        $input['password'] = $password;

        try {
            $this->createUserValidator->validate($input);
        } catch (FormValidationException $e) {
            return Redirect::back()
                ->withErrors($e->getErrors())
                ->withInput();
        }

        $input['password'] = \Hash::make($password);
        $user = $this->users->create($input);
        $this->events->fire('user.created', array($user, $password));

        Notification::success('User was created with password: '.$password);
        return Redirect::route('admin.users.index');
    }

    /**
     * Display the specified user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->users->find($id);

        return View::make('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->users->find($id);

        return View::make('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = Input::all();

        $input = $this->userSanitizer->sanitize($input);

        try {
            $this->updateUserValidator->validate($input, $id);
        } catch (FormValidationException $e) {
            return Redirect::back()
                ->withErrors($e->getErrors())
                ->withInput();
        }

        $user = $this->users->update($id, $input);
        $this->events->fire('user.updated', array($user));

        Notification::success('User was updated.');
        return Redirect::route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->users->find($id);

        $this->events->fire('user.deleting', array($user));
        $this->users->delete($id);
        $this->events->fire('user.deleted', array($id));

        Notification::success('User was deleted.');
        return Redirect::route('admin.users.index');
    }

}
