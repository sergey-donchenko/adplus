<?php 

class AccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$aAccountDetails = array();
		$this->prependTitle('Account Dashboard');		

		return View::make('account.dashboard', array('headTitle' => $this->getTitles()));	
	}


	/**
	 * Display login page
	 *
	 * @return Response
	 */
	public function login()
	{
		return View::make('account.login');	
	}

	/**
	 * Display login page
	 *
	 * @return Response
	 */
	public function authorization()
	{
		// Check if user has been authorized already
		if ( Auth::check() ) {
			return Response::json(array(
		        'fail' => false,
		        'message' => 'User has been successfully authenticated already.'
		    ));
		}
			
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields);

		$userData = array(
			'email'     =>  $formFields['email'],
			'password'  =>  $formFields['password'],
			'rememberme'  =>  isset($formFields['rememberme']) ? true : false,
		);

		$rules = array(
			'email'     =>  'required|email',
			'password'  =>  'required|min:6',
		);

		$validator = Validator::make($userData, $rules);

		if($validator->fails()) {
			return Response::json(array(
	            'fail' => true,
	            'errors' => $validator->getMessageBag()->toArray()
	        ));
		} else {

		    if (Auth::attempt(array('user_email' => $formFields['email'], 'password' => $userData['password'], 'user_is_active' => '1'), $userData['rememberme']) ) {
			    return Response::json(array(
		            'fail' => false,
		            'message' => 'User has successfully authenticated.'
		        ));
			} else {
				return Response::json(array(
		            'fail' => true,
		            'errors' => array(
		            	'email' => array(
		            		0 => 'The User cannot be found in the system.'
		            	)
		            )
		        ));
			}		    
		}
	}

	/**
	 * Logout from the system
	*/
	public function logout() 
	{		
		if ( Auth::check() ) {
			Auth::logout();
		}		

		return Redirect::route('home')->with('flash_notice', 'You are successfully logged out.');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->prependTitle('Create account');		
		

		return View::make('account.create', array('headTitle' => $this->getTitles()));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *	 
	 * @return Response
	 */
	public function edit()
	{
		$this->prependTitle('Edit Account Information');
		
		return View::make('account.edit', array('headTitle' => $this->getTitles()));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

?>