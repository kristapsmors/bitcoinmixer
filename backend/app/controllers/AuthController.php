<?php
/*
|--------------------------------------------------------------------------
| Confide Controller Template
|--------------------------------------------------------------------------
|
| This is the default Confide controller template for controlling user
| authentication. Feel free to change to your needs.
|
*/

class AuthController extends BaseController {


    /**
     * Displays the login form
     *
     */
    public function login()
    {
        if( Confide::user() )
        {
            return Redirect::to('admin/users');
        }
        else
        {
            return View::make('auth.login');
        }
    }

    /**
     * Attempt to do login
     *
     */
    public function do_login()
    {
        $input = array(
            'email'    => Input::get( 'email' ),
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );



        $user = User::where('email', $input['email'])->first();
        
        if(!empty($user) && $user->status == 0) 
        {
            return Redirect::action('AuthController@login')
                            ->withInput(Input::except('password'))
                ->with( 'error', Lang::get('main.account_suspended') );   
        }

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        if ( Confide::logAttempt( $input ) ) 
        {

            $user = Confide::user();

            return Redirect::to('admin/users');
            
        }
        else
        {
            $user = new User;

            // Check if there was too many login attempts
            if( Confide::isThrottled( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            }
            elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
            {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            }
            else
            {
                $err_msg = Lang::get('main.wrong_credentials');
            }

                        return Redirect::action('AuthController@login')
                            ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }


    /**
     * Log the user out of the application.
     *
     */
    public function logout()
    {
        Confide::logout();
        
        return Redirect::to('/login');
    }

}
