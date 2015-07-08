<?php
use \Jacwright\RestServer\RestException;
class UserController
{
    /**
     * Logs in a user with the given username and password POSTed. Though true
     * REST doesn't believe in sessions, it is often desirable for an AJAX server.
     *
     * @url POST /login
     */
    public function login()
    {
        try {
        	return array('teste');
	        $username = trim($_POST['username']);
	        if($username === '')
	        	throw new AuthenticationException("Empty username not allowed");
	        $password = trim($_POST['password']);
	        if($password === '')
	        	throw new AuthenticationException("Empty password not allowed");
        	$userAccount = UserAccount::getUserByUsernameAndPassword($username, $password);
        	if($userAccount instanceof UserAccount)
        		Core::getUser($userAccount);
        } catch(Exception $ex) {
        	throw new RestException(401, $ex->getMessage(), $ex);
        }
        return array("success" => "Logged in " . $username);
    }

    /**
     * Gets the user by id or current user
     *
     * @url GET /$id
     * @url GET /current
     */
    public function getUser($id = null)
    {
        if ($id) {
            $user = UserAccount::get($id); // possible user loading method
        } else {
            $user = Core::getUser();
        }
        return $user instanceof UserAccount ? $user->getJson() : array(); // serializes object into JSON
    }

    /**
     * Saves a user to the database
     *
     * @url POST /
     * @url PUT /$id
     */
    public function saveUser($id = null, $data)
    {
        // ... validate $data properties such as $data->username, $data->firstName, etc.
        // $data->id = $id;
        // $user = User::saveUser($data); // saving the user to the database
        $user = array("id" => $id, "name" => null);
        return $user; // returning the updated or newly created user object
    }
}