<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    function index(){

    	/*$data  = ['id'=>'1233', 'name'=>'alamin'];
    	return view('home.index', $data);*/

    	/*return view('home.index')
    			->with('name', 'alamin')
    			->with('id', '1233');*/

    	/*return view('home.index')
    			->withName('alamin')
    			->withId('1233');*/

    	/*$v = view('home.index');
    	$v->withName('alamin');
    	$v->withId('1234');
    	return $v;*/

    	$users = $this->getStudentList();
		return view('home.index')->with('users', $users);
    }

    function edit($id){
    	$users = $this->getStudentList();
		//find one student by ID from array
		foreach ($users as $user) {
			if ($user['id'] === $id) {
				$user = ['id'=>$user['id'], 'name'=>$user['name'],'email'=>$user['email'], 'password'=>$user['password']];
				break;
			}
		}
    	return view('home.edit')->with('user', $user);
    }

    function update($id, Request $request){

    	//$newUser = ['id'=>$id, 'name'=>$request->name,'email'=>$request->email, 'password'=>$request->password];
    	$users = $this->getStudentList();
		//find one student by ID from array $& replace it's value
		foreach ($users as $user) {
			if ($user['id'] === $id) {
				//$user = $newUser;
				for ($i = 0; $i != count($users); $i++){
					if($users[$i]['id'] === $user['id']){	
						$users[$i]['id'] = $id;
						$users[$i]['name'] = $request->name;
						$users[$i]['email'] = $request->email;
						$users[$i]['password'] = $request->password;
					}
				}
				break;
			}
		}
		//updated list
		return view('home.index')->with('users', $users);
    }
	

    function delete($id){
    	$users = $this->getStudentList();
    	//show comfirm view
		foreach ($users as $user) {
			if ($user['id'] === $id) {
				$user = ['id'=>$user['id'], 'name'=>$user['name'],'email'=>$user['email'], 'password'=>$user['password']];
				break;
			}
		}
    	return view('home.delete')->with('user', $user);
	}
	
    function destroy($id, Request $request){
    	
    	$users = $this->getStudentList();
		//find student by id & delete
		foreach ($users as $user) {
			if ($user['id'] === $id) {
				for ($i = 0; $i != count($users); $i++){
					if($users[$i]['id'] === $user['id']){
						unset($users[$i]);
					}
				}
				break;
			}
		}
		//print_r($users);
    	return view('home.index')->with('users', $users);
    }


    function getStudentList(){
    	return  [
	    			['id'=>'1', 'name'=>'alamin','email'=>'abc@gmail.com', 'password'=>'123'],
	    			['id'=>'2', 'name'=>'abc','email'=>'abc@aiub.com', 'password'=>'456'],
					['id'=>'3', 'name'=>'xyz','email'=>'xyz@gmail.com', 'password'=>'789'],
					['id'=>'4', 'name'=>'saif','email'=>'saif@gmail.com', 'password'=>'567']
				];
    }
}