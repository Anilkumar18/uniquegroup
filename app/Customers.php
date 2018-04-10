<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Crypt;
use App\User;

class Customers extends Model
{
  
  protected $table = "customers";
  
  protected $fillable=[
					  'CountryID', 'StateID', 'CustomerName','MainContactFirstname','MainContactLastname','PhoneNumber','Email','Suite','Street','City','ZIPcode','status'
					  ];
					

		public static function getuserpassword($email)
    {
       
       $user = User::where('email',$email)->pluck('Visible_password')->first();
       //print_r($user);
        $output = Crypt::decrypt($user); 
        //echo $user->Visible_password;
        return $output;
    }			
}



?>
