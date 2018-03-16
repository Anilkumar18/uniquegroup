<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage, Auth, Log;
use Session;

class UserRole extends Model
{
  
 
					  
					 
public static function getUserRoleNameByID()
    {
	
       Auth::logout();
       Session::flush();
       return redirect('/login')->with('info', 'You Was Not Allowed To access This Page');
        
        //  return Submission::where('user_id', Auth::user()->getPrimaryId())->where('status', 'pending')->where('alert', false)->count();
    
	} 
}
