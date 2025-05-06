<?php

class Home 
{
    use Controller;
    public function index()
    {
        //$user = new User;
        $data = [];
        $data['username'] = empty($_SESSION['USER']) ? 'User' :$_SESSION['USER']->email;
        //testing insert function
        //$arr['name'] = 'kevin';
        //$arr['age'] = 11;
        //use only for insert function testing 
        //$arr['date'] = date("Y-m-d");

        
        //$result = $user->insert($arr);
        
        //testing delete function
        //$result = $user->delete(1);

        //testing update function
        //$result = $user->update(2, $arr);
        
        //testing findId function
        //$result = $user->findId(['id'=>4]);
        
        //show($result);
        
        $this->view('home', $data);
    }
}

