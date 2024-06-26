<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggeduserID = session()->get('loggedUser');
        $userInfo = $usersModel ->find($loggeduserID);
        $data = [
            'title' => 'Dashboard',
            'userInfo'=> $userInfo
        ];
        if ($userInfo['role'] == 'admin') {
            return view('dashboard/admin', $data);
        } elseif ($userInfo['role'] == 'patient') {
            return view('dashboard/patient', $data);
        } elseif ($userInfo['role'] == 'doctor') {
            return view('dashboard/doctor', $data);
       // return view('dashboard/index', $data);
    } 
}
}