<?php

class AdminUsersController extends AdminController {


    /**
    * User Model
    * @var User
    */
    protected $user;

    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;
    }

    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function getIndex()
    {
        // Title
        $title = Lang::get('main.users');

        // Grab all the users
        $users = $this->user->all();

        // Show the page
        return View::make('admin/users/index', compact('users', 'title'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param $user
    * @return Response
    */
    public function getEdit($user)
    {
        if ( $user->id )
        {
            // Title
            $title = Lang::get('main.edit_user');

            // mode
            $mode = 'edit';

            return View::make('admin/users/create_edit', compact('user', 'mode', 'title'));
        }
        else
        {
            return Redirect::to('admin/users')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
    * Update the specified resource in storage.
    *
    * @param $user
    * @return Response
    */
    public function postEdit($user)
    {
        // Validate the inputs
        $validator = Validator::make(Input::all(), $user->getUpdateRules());


        if ($validator->passes())
        {
            $oldUser = clone $user;
            $user->name = Input::get( 'name' );
            $user->email = Input::get( 'email' );

            $user->confirmed = 1;
            $password = Input::get( 'password' );
            $passwordConfirmation = Input::get( 'password_confirmation' );

            if(!empty($password)) {
                if($password === $passwordConfirmation) {
                    $user->password = $password;
                    // The password confirmation will be removed from model
                    // before saving. This field will be used in Ardent's
                    // auto validation.
                    $user->password_confirmation = $passwordConfirmation;
                } else {
                    $response['ok'] = false;
                    $response['errors'] = array(Lang::get('admin/users/messages.password_does_not_match'));
                }
            } else {
                unset($user->password);
                unset($user->password_confirmation);
            }
            
            if($user->confirmed == null) {
                $user->confirmed = $oldUser->confirmed;
            }


            // Save if valid. Password field will be hashed before save
            $user->amend();

        }

        if($validator->passes()) {
            $response['ok'] = true;
        } else {
            $response['ok'] = false;
            $response['error'] = $validator->messages()->all();
        }

        return Response::json($response);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function getCreate()
    {

        // Title
        $title = Lang::get('main.add_new_user');

        // Mode
        $mode = 'create';

        // Show the page
        return View::make('admin/users/create_edit', compact('mode', 'title'));
    }


    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function postCreate()
    {
        $this->user->name = Input::get( 'name' );
        $this->user->email = Input::get( 'email' );
        $this->user->password = Input::get( 'password' );
        $this->user->confirmed = 1;

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $this->user->password_confirmation = Input::get( 'password_confirmation' );

        // Save if valid. Password field will be hashed before save
        $this->user->save();

        if ( $this->user->id )
        {
            $response['ok'] = true; 
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $this->user->errors()->all();

            $response['ok'] = false;
            $response['error'] = $error;
        }

        return Response::json($response);
    }



    /**
    * Sets user status
    *
    * @param $user
    * @param $status
    */
    public function getStatus($user, $status)
    {

        if ( $user->id )
        {
            $user->status = $status;
            $user->amend(array('status' => 'required'));
        }
    }

    /**
    * Login as partner user
    *
    */
    public function getLoginAs($user)
    {

        if ( $user->id && $user->admin == 0 )
        {
            Session::put('login_as', $user->id);

            return Redirect::to($user->loginRedirect());
        }
    }

    
}