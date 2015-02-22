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
		$inputData = Input::get('formData');
		parse_str($inputData, $formFields);

		$userData = array(
			'email'     =>  $formFields['email'],
			'password'  =>  $formFields['password'],
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
			$password = $userData['password'];
		    //hash it now
		    $userData['password'] =    Hash::make($userData['password']);
		    
		}

		die('Do an authorization...');
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