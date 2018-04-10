<?php







/*



|--------------------------------------------------------------------------



| Web Routes



|--------------------------------------------------------------------------



|



| Here is where you can register web routes for your application. These



| routes are loaded by the RouteServiceProvider within a group which



| contains the "web" middleware group. Now create something great!



|



*/







Route::get('/', function () {



    return view('welcome');



});







Route::get('/', 'Auth\LoginController@showLoginForm');







Auth::routes();







Route::post('/login' , 'Auth\LoginController@authenticate');


//bala

Route::get('/activate/{id}' , 'Auth\MailActivateController@CustomerServiceApproval')->name('customerserviceactivate');

Route::get('/accountmanagerconfirmationforquote/{id}' , 'Auth\MailActivateController@ACapprovalsendsamplerequest_toadmin')->name('ACapprovalsendsamplerequest_toadmin');

Route::post('/adminsendacknowledgementto_accountsmanager/{id}' , 'Auth\MailActivateController@administratoracknowledgement')->name('adminsendacknowledgementto_accountsmanager');

Route::get('/adminapprovalform/{id}' , 'Auth\MailActivateController@AdminApprovalform')->name('adminapprovalform');


/*Route::get('/AccountmanagerSuggestingSellingpriceApprovalform/{id}' , 'Auth\MailActivateController@AccountmanagerSuggestingSellingprice_Approvalform')->name('AccountmanagerSuggestingSellingpriceApprovalform');*/


Route::post('sendconfirmationmail','Auth\MailActivateController@sendsamplerequest_bycustomerservice')->name('sendconfirmationmailtoAC');

Route::post('sendsuggestsellingprice_administrator','Auth\MailActivateController@suggestsellingpriceto_administrator')->name('sendsuggestsellingprice_administrator');

//account manager approval to change status

Route::get('/accountmanager_approvalform/{id}' , 'Auth\MailActivateController@AccoutsmanagerApprovalform')->name('accountmanager_approvalform');

Route::post('accountmanager_changeproductstatus/{id}','Auth\MailActivateController@AccountsmanagerChangedstatus')->name('accountmanager_changeproductstatus');

Route::get('accountmanager_rejectbydirect/{id}','Auth\MailActivateController@RejectdirectlybyAM')->name('accountmanager_rejectbydirect');


//Route::get('activation','MailController@activateartwork')->name('user.activation');



//end code







Route::get('/dashboard', 'HomeController@index')->name('dashboard');



Route::get('/projectlist', 'HomeNewController@projectlist')->name('projectlist');






Route::get('/welcome', 'HomeController@welcome');











// Admin







Route::group(['middleware' => 'auth.admin'], function(){







Route::post('logout', 'Auth\LoginController@logout');











Route::get('/admin/dashboard', 'Admin\AdminController@index')->name('admin.home');







Route::post('/admin/password_change', 'Admin\AdminController@passwordChange')->name('admin.changepassword');















//customers



Route::get('/admin/customers','Admin\CustomerController@customerList')->name('admin.customers');



Route::get('/admin/addnewcustomer','Admin\CustomerController@viewcustomers')->name('admin.addnewcustomers');



//Route::get('/admin/customersdetails','Admin\CustomerController@customerviewlist')->name('admin.customersdetails');
Route::get('/admin/customersdetails/{id}','Admin\CustomerController@customerviewlist')->name('admin.customersdetails');

  

Route::post('/admin/addcustomer','Admin\CustomerController@addcustomers')->name('admin.addcustomers');



Route::get('/admin/addcustomers/{id}/edit', 'Admin\CustomerController@edit')->name('customer.edit');



Route::post('/admin/customer_delete/{id}', 'Admin\CustomerController@delete')->name('customer.delete');

   

Route::post('/admin/selectcustomer/{id}','Admin\CustomerController@selectState')->name('admin.selectstate');


//Defect: new users.pdf
         //Name: Bala-php Team
         //change customer name depends upon change vendor and factory names as alphabetic order
  

Route::post('/admin/selectvendors/{id}','Admin\VendorUsersController@selectVendors')->name('admin.selectvendors');

Route::post('/admin/selectfactory/{id}','Admin\VendorUsersController@selectFactory')->name('admin.selectfactory');



Route::get('/admin/customerlogo/{id}', 'Admin\CustomerController@getLogo')->name('customerlogo');



// Customer Users



Route::get('/admin/customerusers', 'Admin\CustomerUsersController@customerusersList')->name('admin.customerusers');

 
Route::get('/admin/addcustomerusers', 'Admin\CustomerUsersController@viewcustomerusers')->name('admin.addcustomerusers');
Route::get('/admin/customerusers/{id}/', 'Admin\CustomerUsersController@customerusersid')->name('admin.customerusersid'); 

  

Route::post('/admin/selectcustomerusers/{id}','Admin\CustomerUsersController@selectCustomerUsers')->name('admin.selectCustomerbyID');



Route::get('/admin/selectstate/{id}','Admin\CustomerUsersController@selectState')->name('admin.selectuserstate');

 //Defect: new users.pdf
         //Name: Bala-php Team
         //change customer name depends upon change vendor and factory names as alphabetic order
  

Route::post('/admin/selectvendors/{id}','Admin\VendorUsersController@selectVendors')->name('admin.selectvendors');

Route::post('/admin/selectfactory/{id}','Admin\VendorUsersController@selectFactory')->name('admin.selectfactory');

Route::post('/admin/addcustomerusers', 'Admin\CustomerUsersController@addnewusers')->name('admin.addnewcustomerusers');



//Route::get('/admin/customerusersdetails', 'Admin\CustomerUsersController@customerusersDetails')->name('admin.customerusersdetails');

Route::get('/admin/customerusersdetails/{id}', 'Admin\CustomerUsersController@customerusersDetails')->name('admin.customerusersdetails');



Route::get('/admin/addcustomerusers/{id}/edit', 'Admin\CustomerUsersController@edit')->name('customeruser.edit');

//Defect: 27-03-2018
         //Name: Bala-php Team
         //Add active and deactive and suspend account
		 
Route::post('/admin/customeruser_activate/', 'Admin\CustomerUsersController@activate')->name('customeruser.activate');

Route::post('/admin/customeruser_deactivate/', 'Admin\CustomerUsersController@deActivate')->name('customeruser.deactivate');	

Route::post('/admin/customeruser_delete/', 'Admin\CustomerUsersController@delete')->name('customeruser.delete');

//Route::post('/admin/customeruser_delete/{id}', 'Admin\CustomerUsersController@delete')->name('customeruser.delete');



//vendors

  

Route::get('/admin/vendors','Admin\VendorsController@vendorslist')->name('admin.vendors');

  

Route::get('/admin/addvendors','Admin\VendorsController@viewvendors')->name('admin.viewvendors');

   

Route::post('/admin/addvendors','Admin\VendorsController@addvendors')->name('admin.addvendors');

   

Route::get('/admin/addvendors/{id}/edit','Admin\VendorsController@edit')->name('vendors.edit');

  

Route::post('/admin/vendors/delete/{id}','Admin\VendorsController@delete')->name('vendors.delete');

   

Route::post('/admin/addoffice','Admin\VendorsController@factoryAddress')->name('admin.addoffice');

	 

Route::get('/admin/addcountryoperations','Admin\VendorsController@countryselection')->name('admin.addcountryoperations');

	  

Route::get('/admin/vendorsdetails/{id}','Admin\VendorsController@vendorsdetailslist')->name('admin.vendorsdetails');



Route::post('/admin/selectstate/{id}','Admin\VendorsController@selectState')->name('admin.selectvendorstate');


Route::post('/admin/selectfactory', 'Admin\VendorsController@factoryCheck')->name('admin.selectfactory');


Route::post('/admin/listcountry','Admin\VendorsController@listCountry')->name('admin.listcountry');


// Vendor Users



Route::get('/admin/vendorusers', 'Admin\VendorUsersController@vendorusersList')->name('admin.vendorusers');


Route::get('/admin/vendorusers/{id}', 'Admin\VendorUsersController@vendorusersListid')->name('admin.vendorusersid');


Route::get('/admin/addvendorusers', 'Admin\VendorUsersController@viewvendorusers')->name('admin.addvendorusers');



Route::post('/admin/addvendorusers', 'Admin\VendorUsersController@addnewusers')->name('admin.addnewvendorusers');



Route::get('/admin/addvendorusers/{id}/edit', 'Admin\VendorUsersController@edit')->name('vendoruser.edit');



//Route::get('/admin/vendorusersdetails', 'Admin\VendorUsersController@vendorusersDetails')->name('admin.vendorusersdetails');
Route::get('/admin/vendorusersdetails/{id}', 'Admin\VendorUsersController@vendorusersDetails')->name('admin.vendorusersdetails');


//Defect: 27-03-2018
         //Name: Bala-php Team
         //Add active and deactive and suspend account
		 
Route::post('/admin/vendoruser_activate/', 'Admin\VendorUsersController@activate')->name('vendoruser.activate');

Route::post('/admin/vendoruser_deactivate/', 'Admin\VendorUsersController@deActivate')->name('vendoruser.deactivate');	

Route::post('/admin/vendoruser_delete/', 'Admin\VendorUsersController@delete')->name('vendoruser.delete');
//Route::post('/admin/vendoruser_delete/{id}', 'Admin\VendorUsersController@delete')->name('vendoruser.delete');



  //uniqueoffices

  

 Route::get('/admin/facilities','Admin\UniqueController@uniquefacilitylist')->name('admin.uniquefacility');

 

 Route::get('/admin/addnewfacility','Admin\UniqueController@viewuniquefacility')->name('admin.viewuniquefacility');

   

 Route::post('/admin/adduniquefacility','Admin\UniqueController@adduniquefacility')->name('admin.adduniquefacility');

   

 Route::get('/admin/adduniquefacility/{id}/edit','Admin\UniqueController@Edit')->name('admin.uniquefacilityedit');

	

 Route::post('/admin/facilities/delete/{id}', 'Admin\UniqueController@delete')->name('uniquefacilities.delete');

 

 Route::get('/admin/uniquefacilitydetails/{id}','Admin\UniqueController@uniquefacilitydetailslist')->name('admin.uniquefacilitydetails');
 
 




 
//Defect: 30-03-2018
         //Name: Purushothaman-Uniquegroup Team
         //Pricestickers maintenance
		 
Route::get('/admin/pdmmaintenance/maintanencenew', 'Admin\PdmController@pdmmaintanencenew')->name('admin.pdmnew');
 Route::post('/admin/pdmmaintenance/add_productstore', 'Admin\PdmProductgroupsController@addProductstorelist')->name('admin.add_productstore');




Route::get('/admin/pdmmaintenance/edit_pricestickercolor/{id}', 'Admin\PdmProductgroupsController@getpricestickerdetails')->name('admin.get_pricestickercolor');



Route::get('/admin/pdmmaintenance/delete_pricestickercolor/{id}', 'Admin\PdmProductgroupsController@deletepricestickerdetails')->name('admin.delete_pricestickercolor');




Route::get('admin/pdmstickermaintenance/stickersymbolactivate/{id}','Admin\PdmProductgroupsController@stickersymbolactivate')->name('admin.stickersymbolactive');


Route::get('admin/pdmstickermaintenance/stickersymboldeactivate/{id}','Admin\PdmProductgroupsController@stickersymboldeactivate')->name('admin.stickersymboldeactive');

 

 //uniqueusers





Route::get('/admin/uniqueusers', 'Admin\UniqueUsersController@uniqueusersList')->name('admin.uniqueusers');



Route::get('/admin/adduniqueusers', 'Admin\UniqueUsersController@viewuniqueusers')->name('admin.adduniqueusers');



Route::post('/admin/adduniqueusers', 'Admin\UniqueUsersController@addnewusers')->name('admin.addnewuniqueusers');



Route::get('/admin/adduniqueusers/{id}/edit', 'Admin\UniqueUsersController@edit')->name('uniqueuser.edit');



//Route::get('/admin/uniqueusersdetails', 'Admin\UniqueUsersController@uniqueusersDetails')->name('admin.uniqueusersdetails');

Route::get('/admin/uniqueusersdetails/{id}', 'Admin\UniqueUsersController@uniqueusersDetails')->name('admin.uniqueusersdetails');



//Route::post('/admin/uniqueuser_delete/{id}', 'Admin\UniqueUsersController@delete')->name('uniqueuser.delete');
Route::post('/admin/uniqueusers/delete/{id}', 'Admin\UniqueUsersController@delete')->name('uniqueuser.delete');


Route::post('/admin/selectuser/{id}', 'Admin\UniqueUsersController@userCheck')->name('admin.selectuser');

//Defect: 26-03-2018
         //Name: bala-Uniquegroup Team
         //Desc. Active and deactive functions for uniqueusers
		 
Route::post('/admin/uniqueuser_activate/', 'Admin\UniqueUsersController@activate')->name('uniqueuser.activate');

Route::post('/admin/uniqueuser_deactivate/', 'Admin\UniqueUsersController@deActivate')->name('uniqueuser.deactivate');	


Route::post('/admin/uniqueuser_delete/', 'Admin\UniqueUsersController@delete')->name('uniqueuser.delete');	 

//Product Heat Transfers Maintenance

Route::get('/admin/product/dashboard', 'Admin\ProductController@index')->name('admin.producthome');

Route::get('/admin/heattransfers', 'Admin\HeatTransfersController@heattransferlist')->name('admin.heattransfers');

Route::get('/admin/addheattransfers','Admin\HeatTransfersController@viewheattransfers')->name('admin.viewheattransfers');

Route::post('/admin/addheattransfers','Admin\HeatTransfersController@addheattransfers')->name('admin.addheattransfers');

Route::get('/admin/addheattransfers/{id}','Admin\HeatTransfersController@version');

 Route::get('/admin/add_region','Admin\HeatTransfersController@AddRegiondetails')->name('admin.add_region');
 
 
 //add heattransfer(admin)

Route::get('/admin/addheattransfersinfo', 'Admin\HeatTransfersController@addheattransferslist')->name('admin.addheattransfersinfo');

Route::post('/admin/heattransfersinfo', 'Admin\HeatTransfersController@addheattransferinfo')->name('admin.addheattransfersinsertions');


Route::get('/admin/inventoryinformation', 'Admin\HeatTransfersController@addproductinventoryview')->name('admin.productinventoryview');

Route::get('/admin/heattransferdetails', 'Admin\HeatTransfersController@heattransferDetails')->name('admin.heattransferdetails');

Route::get('/admin/adduniqueoffice','Admin\HeatTransfersController@uniquefactoryselection')->name('admin.adduniqueoffice');


//pdm maintenance

Route::get('/admin/pdmmaintenance/dashboard', 'Admin\PdmController@index')->name('admin.pdmhome');

//Defect: 
         //Name: Bala-Uniquegroup Team
         //Symbol maintenance page

//symobol 

 Route::get('ecommercemaintenance/symbollist','EcommerceMaintenance\SymbolController@SymbolList')->name('admin.symbollist');
 
 Route::post('ecommercemaintenance/add_symbollist', 'EcommerceMaintenance\SymbolController@addSymbollist')->name('admin.add_symbolist');
 
 Route::post('ecommercemaintenance/symbolist_activate','EcommerceMaintenance\SymbolController@Symbolactivate')->name('admin.symbolactive');
 
 Route::post('ecommercemaintenance/symbolist_deactivate/', 'EcommerceMaintenance\SymbolController@SymboldeActivate')->name('admin.symboldeactive');
 
 Route::post('ecommercemaintenance/symbolist_delete/', 'EcommerceMaintenance\SymbolController@delete')->name('admin.symboldelete');
 
 Route::post('ecommercemaintenance/add_symbollist/{id}', 'EcommerceMaintenance\SymbolController@Symbol_Select')->name('admin.symbolselect');
 
 Route::get('ecommercemaintenance/symbolimg/{id}', 'EcommerceMaintenance\SymbolController@getsymbolimg')->name('admin.symbolimage');
 
 //Defect: 29-03-2018 & 30-03-2018
         //Name: Bala-Uniquegroup Team
         //Add Care Instructions Dry maintenance page
   
 //Care Instructions-dry maintenance
 
 Route::get('/ecommercemaintenance/dashboard', 'EcommerceMaintenance\EcommerceController@index')->name('ecommercemaintenance.home');
 
 Route::get('ecommercemaintenance/dry/symbollist','EcommerceMaintenance\CareInstructionsDryController@DrySymbolList')->name('admin.drysymbollist');
 
 Route::post('ecommercemaintenance/dry/add_symbollist', 'EcommerceMaintenance\CareInstructionsDryController@addDrySymbollist')->name('admin.dryadd_symbolist');
 
 Route::post('ecommercemaintenance/dry/symbolist_activate/{id}','EcommerceMaintenance\CareInstructionsDryController@DrySymbolactivate')->name('admin.drysymbolactive');
 
 Route::post('ecommercemaintenance/dry/symbolist_deactivate/{id}', 'EcommerceMaintenance\CareInstructionsDryController@DrySymboldeActivate')->name('admin.drysymboldeactive');
 
 Route::post('ecommercemaintenance/dry/symbolist_delete/{id}', 'EcommerceMaintenance\CareInstructionsDryController@delete')->name('admin.drysymboldelete');
 
 Route::post('ecommercemaintenance/dry/add_symbollist/{id}', 'EcommerceMaintenance\CareInstructionsDryController@DrySymbol_Select')->name('admin.drysymbolselect');
 
 Route::get('ecommercemaintenance/dry/symbolimg/{id}', 'EcommerceMaintenance\CareInstructionsDryController@getsymbolimg')->name('admin.drysymbolimage');
 
 
 
 //Care Instructions-wash maintenance
 Route::get('ecommercemaintenance/wash/symbollist','EcommerceMaintenance\CareInstructionsWashController@WashSymbolList')->name('admin.washsymbollist');
 
 Route::post('ecommercemaintenance/wash/add_symbollist', 'EcommerceMaintenance\CareInstructionsWashController@addWashSymbollist')->name('admin.washadd_symbolist');
 
 Route::post('ecommercemaintenance/wash/symbolist_activate/{id}','EcommerceMaintenance\CareInstructionsWashController@WashSymbolactivate')->name('admin.washsymbolactive');
 
 Route::post('ecommercemaintenance/wash/symbolist_deactivate/{id}', 'EcommerceMaintenance\CareInstructionsWashController@WashSymboldeActivate')->name('admin.washsymboldeactive');
 
 Route::post('ecommercemaintenance/wash/symbolist_delete/{id}', 'EcommerceMaintenance\CareInstructionsWashController@delete')->name('admin.washsymboldelete');
 
 Route::post('ecommercemaintenance/wash/add_symbollist/{id}', 'EcommerceMaintenance\CareInstructionsWashController@WashSymbol_Select')->name('admin.washsymbolselect');
 
 Route::get('ecommercemaintenance/wash/symbolimg/{id}', 'EcommerceMaintenance\CareInstructionsWashController@getsymbolimg')->name('admin.washsymbolimage');
 
 
 
  //Care Instructions-bleach maintenance
 Route::get('ecommercemaintenance/bleach/symbollist','EcommerceMaintenance\CareInstructionsBleachController@BleachSymbolList')->name('admin.bleachsymbollist');
 
 Route::post('ecommercemaintenance/bleach/add_symbollist', 'EcommerceMaintenance\CareInstructionsBleachController@addBleachSymbollist')->name('admin.bleachadd_symbolist');
 
 Route::post('ecommercemaintenance/bleach/symbolist_activate/{id}','EcommerceMaintenance\CareInstructionsBleachController@BleachSymbolactivate')->name('admin.bleachsymbolactive');
 
 Route::post('ecommercemaintenance/bleach/symbolist_deactivate/{id}', 'EcommerceMaintenance\CareInstructionsBleachController@BleachSymboldeActivate')->name('admin.bleachsymboldeactive');
 
 Route::post('ecommercemaintenance/bleach/symbolist_delete/{id}', 'EcommerceMaintenance\CareInstructionsBleachController@delete')->name('admin.bleachsymboldelete');
 
 Route::post('ecommercemaintenance/bleach/add_symbollist/{id}', 'EcommerceMaintenance\CareInstructionsBleachController@BleachSymbol_Select')->name('admin.bleachsymbolselect');
 
 Route::get('ecommercemaintenance/bleach/symbolimg/{id}', 'EcommerceMaintenance\CareInstructionsBleachController@getsymbolimg')->name('admin.bleachsymbolimage');
 
 //Care Instructions-Iron maintenance
 Route::get('ecommercemaintenance/iron/symbollist','EcommerceMaintenance\CareInstructionsIronController@IronSymbolList')->name('admin.ironsymbollist');
 
 Route::post('ecommercemaintenance/iron/add_symbollist', 'EcommerceMaintenance\CareInstructionsIronController@addIronSymbollist')->name('admin.ironadd_symbolist');
 
 Route::post('ecommercemaintenance/iron/symbolist_activate/{id}','EcommerceMaintenance\CareInstructionsIronController@IronSymbolactivate')->name('admin.ironsymbolactive');
 
 Route::post('ecommercemaintenance/iron/symbolist_deactivate/{id}', 'EcommerceMaintenance\CareInstructionsIronController@IronSymboldeActivate')->name('admin.ironsymboldeactive');
 
 Route::post('ecommercemaintenance/iron/symbolist_delete/{id}', 'EcommerceMaintenance\CareInstructionsIronController@delete')->name('admin.ironsymboldelete');
 
 Route::post('ecommercemaintenance/iron/add_symbollist/{id}', 'EcommerceMaintenance\CareInstructionsIronController@IronSymbol_Select')->name('admin.ironsymbolselect');
 
 Route::get('ecommercemaintenance/iron/symbolimg/{id}', 'EcommerceMaintenance\CareInstructionsIronController@getsymbolimg')->name('admin.ironsymbolimage');
 
 
 //Care Instructions-dryclean maintenance
 Route::get('ecommercemaintenance/dryclean/symbollist','EcommerceMaintenance\CareInstructionsDryCleanController@DryCleanSymbolList')->name('admin.drycleansymbollist');
 
 Route::post('ecommercemaintenance/dryclean/add_symbollist', 'EcommerceMaintenance\CareInstructionsDryCleanController@addDryCleanSymbollist')->name('admin.drycleanadd_symbolist');
 
 Route::post('ecommercemaintenance/dryclean/symbolist_activate/{id}','EcommerceMaintenance\CareInstructionsDryCleanController@DryCleanSymbolactivate')->name('admin.drycleansymbolactive');
 
 Route::post('ecommercemaintenance/dryclean/symbolist_deactivate/{id}', 'EcommerceMaintenance\CareInstructionsDryCleanController@DryCleanSymboldeActivate')->name('admin.drycleansymboldeactive');
 
 Route::post('ecommercemaintenance/dryclean/symbolist_delete/{id}', 'EcommerceMaintenance\CareInstructionsDryCleanController@delete')->name('admin.drycleansymboldelete');
 
 Route::post('ecommercemaintenance/dryclean/add_symbollist/{id}', 'EcommerceMaintenance\CareInstructionsDryCleanController@DryCleanSymbol_Select')->name('admin.drycleansymbolselect');
 
 Route::get('ecommercemaintenance/dryclean/symbolimg/{id}', 'EcommerceMaintenance\CareInstructionsDryCleanController@getsymbolimg')->name('admin.drycleansymbolimage');

 //Defect: 30-03-2018
         //Name: purushotham-Uniquegroup Team
         //price sticker Maintenance

Route::get('/EcommerceMaintenance/pricestickermaintanence', 'EcommerceMaintenance\PricestickermaintainController@pricestickermaintanence')->name('admin.pricesticker');

Route::post('EcommerceMaintenance/add_productstore','EcommerceMaintenance\PricestickerController@addProductstorelist')->name('admin.add_productstore');


Route::get('EcommerceMaintenance/edit_pricestickercolor/{id}', 'EcommerceMaintenance\PricestickerController@getpricestickerdetails')->name('admin.get_pricestickercolor');


Route::get('EcommerceMaintenance/delete_pricestickercolor/{id}', 'EcommerceMaintenance\PricestickerController@deletepricestickerdetails')->name('admin.delete_pricestickercolor');

Route::get('EcommerceMaintenance/stickersymbolactivate/{id}','EcommerceMaintenance\PricestickerController@stickersymbolactivate')->name('admin.stickersymbolactive');

Route::get('EcommerceMaintenance/stickersymboldeactivate/{id}','EcommerceMaintenance\PricestickerController@stickersymboldeactivate')->name('admin.stickersymboldeactive');


Route::get('/EcommerceMaintenance/view_pricestickermaintenance/{id}','EcommerceMaintenance\PricestickerController@viewpricestickermaintenance')->name('admin.view_pricestickermaintenance');



//Defect: 31-03-2018
         //Name: purushotham-Uniquegroup Team
         //Garment Component Maintenance

Route::get('/EcommerceMaintenance/garmentcomponentmaintenance','EcommerceMaintenance\GarmentmaintenanceController@garmentmaintenance')->name('admin.garmentmaintenance');

Route::post('/EcommerceMaintenance/add_garmentcomponentmaintenance','EcommerceMaintenance\GarmentmaintenanceController@addgarmentmaintenance')->name('admin.add_garmentmaintenance');

Route::get('/EcommerceMaintenance/delete_garmentcomponentmaintenance/{id}', 'EcommerceMaintenance\GarmentmaintenanceController@deletegarmentmaintenance')->name('admin.delete_garmentmaintenance');

Route::get('/EcommerceMaintenance/edit_garmentcomponentmaintenance/{id}','EcommerceMaintenance\GarmentmaintenanceController@getgarmentmaintenance')->name('admin.edit_garmentmaintenance');

Route::get('EcommerceMaintenance/garmentstickersymbolactivate/{id}','EcommerceMaintenance\GarmentmaintenanceController@garmentstickersymbolactivate')->name('admin.garmentstickersymbolactive');

Route::get('EcommerceMaintenance/garmentstickersymboldeactivate/{id}','EcommerceMaintenance\GarmentmaintenanceController@garmentstickersymboldeactivate')->name('admin.garmentstickersymboldeactive');

Route::get('/EcommerceMaintenance/view_garmentcomponentmaintenance/{id}','EcommerceMaintenance\GarmentmaintenanceController@viewgarmentmaintenance')->name('admin.view_garmentmaintenance');

Route::get('getcaredetails/{id}','EcommerceMaintenance\CareInstructionsController@getcaredetails')->name('careinstruction.getcaredetails');

//product group

 Route::get('/admin/pdmmaintenance/productgroupandsubgroup','Admin\PdmProductgroupsController@ProductGroupList')->name('admin.pdmproductgroups');

  Route::post('/admin/pdmmaintenance/add_productgroup', 'Admin\PdmProductgroupsController@addProductGrouplist')->name('admin.add_productgroup');
  
  Route::post('/admin/pdmmaintenance/productgroup_delete/{id}', 'Admin\PdmProductgroupsController@delete')->name('productgrouplist.delete');
 
  Route::post('/admin/pdmmaintenance/productgroup/{id}', 'Admin\PdmProductgroupsController@ProductGroupSelect')->name('productgrouplist.select');
  
  //product subgroup
  
  Route::post('/admin/pdmmaintenance/add_productsubgroup', 'Admin\PdmProductsubgroupsController@addProductSubGrouplist')->name('admin.add_productsubgroup');
  
 
 Route::post('/admin/pdmmaintenance/productsubgroup/{id}', 'Admin\PdmProductsubgroupsController@ProductSubGroupSelect')->name('productsubgrouplist.select');
 
 
 Route::post('/admin/pdmmaintenance/productsubgroup_delete/{id}', 'Admin\PdmProductsubgroupsController@delete')->name('productsubgrouplist.delete');
 
 //marketing region

Route::get('/admin/pdmmaintenance/mktproductionregions', 'Admin\MarketingRegionController@viewmarketingRegionList')->name('admin.mktproductionregions');

Route::post('/admin/pdmmaintenance/mktproductionregions/{id}/edit', 'Admin\MarketingRegionController@marketingRegionSelect')->name('marketregions.edit');

Route::post('/admin/pdmmaintenance/mktproductionregions/{id}/delete', 'Admin\MarketingRegionController@delete')->name('marketregions.delete');


Route::get('/admin/pdmmaintenance/marketingregions', 'Admin\MarketingRegionController@viewmarketingRegionList')->name('admin.marketingregions');

Route::post('/admin/add_marketingregion','Admin\MarketingRegionController@addMarketingRegion')->name('admin.add_marketingregion');

//Production region 

Route::post('/admin/pdmmaintenance/productionregions/{id}/edit', 'Admin\ProductionRegionController@productionRegionSelect')->name('productionregions.edit');

Route::post('/admin/pdmmaintenance/productionregions/{id}/delete', 'Admin\ProductionRegionController@delete')->name('productionregions.delete');


Route::get('/admin/pdmmaintenance/productionregions', 'Admin\ProductionRegionController@viewproductionRegionList')->name('admin.productionregions');

Route::post('/admin/add_productionregionregion','Admin\ProductionRegionController@addProductionRegion')->name('admin.add_productionregionregion');

//Product details

Route::get('/admin/pdmmaintenance/productdetails', 'Admin\ProductDetailsController@viewProductDetailList')->name('admin.productdetails');

Route::post('/admin/pdmmaintenance/productdetails/{id}/edit', 'Admin\ProductDetailsController@ProductDetailSelect')->name('productdetails.edit');

Route::post('/admin/pdmmaintenance/productdetails/{id}/delete', 'Admin\ProductDetailsController@ProductDetaildelete')->name('productdetails.delete');

Route::post('/admin/add_productdetails','Admin\ProductDetailsController@addProductDetails')->name('admin.add_productdetails');
 
 //product development
 
 Route::get('/admin/pdmmaintenance/productdevelopment/dashboard', 'Admin\ProductDevelopmentController@index')->name('admin.productdevelopmenthome');
 
  Route::get('/admin/pdmmaintenance/productdevelopment/{id}/products', 'Admin\ProductDevelopmentController@viewproductlist')->name('admin.listofproducts');
  
  Route::get('/admin/pdmmaintenance/productdevelopment/{id}/productlists', 'Admin\ProductDevelopmentController@viewgrouplist')->name('admin.viewgrouplist');
  
  Route::post('/admin/pdmmaintenance/productdevelopment/addproductsdropdownoptions/{id}/edit', 'Admin\ProductDevelopmentController@ProductDevelopmentSelect')->name('productsdropdownoptions.edit');
  
   Route::post('/admin/pdmmaintenance/productdevelopment/{id}/delete', 'Admin\ProductDevelopmentController@delete')->name('listofproducts.delete');
   
//Rajesh 07042018
   Route::get('/admin/pdmmaintenance/careinstruction/master', 'EcommerceMaintenance\CareInstructionsController@viewcarelist')->name('admin.viewcarelist');
   Route::get('/admin/pdmmaintenance/careinstruction/data', 'EcommerceMaintenance\CareInstructionsController@getcarelist')->name('admin.getcarelist');


   /*dropdownoptions*/
  
   Route::post('/admin/pdmmaintenance/productdevelopment/editproductsdropdownoptions/', 'Admin\ProductDevelopmentController@addDropdownOptions')->name('editproductsdropdownoptions.edit');
   
    Route::post('/admin/pdmmaintenance/productdevelopment/deleteproductsdropdownoptions', 'Admin\ProductDevelopmentController@deletedropdownvalue')->name('productsdropdownoptions.delete');
	
	Route::post('/admin/pdmmaintenance/productdevelopment/deletedropdownvaluetablename', 'Admin\ProductDevelopmentController@deletedropdownvaluetablename')->name('productsdropdownoptions.deletedropdownvaluetablename');
	
  
  
   Route::post('/admin/pdmmaintenance/productdevelopment/{id}/edit', 'Admin\ProductDevelopmentController@FieldnamesSelect')->name('fieldnamelist.select');
   
   Route::post('/admin/pdmmaintenance/productdevelopment/addfieldnames/{id}', 'Admin\ProductDevelopmentController@addFieldnames')->name('admin.addfieldnames');
   
  Route::post('/admin/pdmmaintenance/productdevelopment/updateallfieldnames/{id}', 'Admin\ProductDevelopmentController@updateallfieldnames')->name('admin.updateallfieldnames');
   

// Country and State Maintenance



Route::get('/admin/countries', 'Admin\CountriesController@countriesList')->name('admin.countries');



Route::get('/admin/addcountry', 'Admin\CountriesController@viewcountries')->name('admin.addcountry');



Route::post('/admin/addcountry', 'Admin\CountriesController@addCountry')->name('admin.addnewcountry');



Route::get('/admin/states', 'Admin\StatesController@statesList')->name('admin.states');



Route::get('/admin/addstate', 'Admin\StatesController@viewstates')->name('admin.addstate');



Route::post('/admin/addstate', 'Admin\StatesController@addnewState')->name('admin.addnewstate');



Route::get('/admin/statedetails', 'Admin\StatesController@stateDetails')->name('admin.statedetails');



Route::post('/admin/state_delete//{id}', 'Admin\StatesController@delete')->name('state.delete');



/*development Dashboard*/

Route::get('/admin/development/dashboard', 'Admin\PdmController@indexdevlopment')->name('admin.developmenthome');

//Defect: 
         //Name: Vidya-Uniquegroup Team
         //Desc. Countryoforigin
Route::get('/admin/countryoforigin', 'countryoforiginController@countryoforigin')->name('admin.countryoforigin');



// Office/Region Routes







Route::get('/admin/officeregions', 'Admin\OfficeRegionController@officeRegionList')->name('admin.officeregions');







Route::post('/admin/add_officeregion', 'Admin\OfficeRegionController@addOfficeRegion')->name('admin.add_officeregion');







Route::post('/admin/officeregion_deactivate/', 'Admin\OfficeRegionController@deActivate')->name('officeregion.deactivate');







Route::post('/admin/officeregion_activate/', 'Admin\OfficeRegionController@activate')->name('officeregion.activate');







Route::post('/admin/officeregion_delete/', 'Admin\OfficeRegionController@delete')->name('officeregion.delete');







Route::post('/admin/officeregion_select/{id}', 'Admin\OfficeRegionController@officeRegionSelect')->name('officeregion.select');











// User Types Routes.







Route::get('/admin/usertypes', 'Admin\UserTypeController@userTypesList')->name('admin.usertypes');







Route::post('/admin/add_usertype', 'Admin\UserTypeController@addUserType')->name('admin.add_usertype');







Route::post('/admin/usertype_deactivate/', 'Admin\UserTypeController@deActivate')->name('usertype.deactivate');







Route::post('/admin/usertype_activate/', 'Admin\UserTypeController@activate')->name('usertype.activate');







Route::post('/admin/usertype_delete/', 'Admin\UserTypeController@delete')->name('usertype.delete');







Route::post('/admin/usertype_select/{id}', 'Admin\UserTypeController@userTypeSelect')->name('usertype.select');


















//raw material Maintenance



Route::get('/admin/rawmaterial', 'Admin\RawMaterialController@RawMaterialList')->name('admin.rawmaterial');







Route::post('/admin/add_rawmaterial','Admin\RawMaterialController@addRawMaterial')->name('admin.add_rawmaterial');







Route::post('/admin/rawmaterial_select/{id}', 'Admin\RawMaterialController@rawmaterialSelect')->name('rawmaterial.select');







Route::post('/admin/rawmaterial_delete/', 'Admin\RawMaterialController@delete')->name('rawmaterial.delete');







Route::post('/admin/rawmaterial_activate/', 'Admin\RawMaterialController@activate')->name('rawmaterial.activate');







Route::post('/admin/rawmaterial_deactivate/', 'Admin\RawMaterialController@deActivate')->name('rawmaterial.deactivate');



//Rajesh 24032018
//productmaintenance
Route::get('/productmaintenance/{id}', 'Admin\ProductDetailsController@getproductmaintenance')->name('product.productmaintenance');



//Rajesh 30032018
//productmaintenance view
Route::get('/productmaintenance/view/{id}', 'ProductMaintenance\PDMDetailsController@ProductDetailSelect')->name('product.viewpdmdetailsmaintenance');

Route::get('productmaintenance/printedimg/{id}', 'ProductMaintenance\PDMDetailsController@getprintedimg')->name('product.printedlabelimage');

/*vidhya:05-04-2018*/

Route::get('productmaintenance/editcustomerproduct/{id}', 'ProductMaintenance\PDMDetailsController@editcustomerproduct')->name('productmaintenance.editcustomerproduct');

Route::post('productmaintenance/update_customerproductsdetails','ProductMaintenance\PDMDetailsController@Updateprocessproductsdetails')->name('productmaintenance.update_customerproductsdetails');

/*Vidhya:31-03-2018
Fabric composition*/
Route::post('/ecommercemaintenance/coodelete/{id}', 'EcommerceMaintenance\CountryofOriginController@deletecoo')->name('ecommercemaintenance.coodelete');


Route::post('/ecommercemaintenance/addnewcoodetails','EcommerceMaintenance\CountryofOriginController@addcoo')->name('ecommercemaintenance.addnewcoo');


//Route::post('login', 'Auth\LoginController@login');


/*Vidhya:30-03-2018
Country of origin*/

Route::get('/ecommercemaintenance/countryoforigin', 'EcommerceMaintenance\CountryofOriginController@countryoforigin')->name('ecommercemaintenance.countryoforigin');
Route::post('/ecommercemaintenance/addnewfabric','EcommerceMaintenance\FabricCompositionController@addfabric')->name('ecommercemaintenance.addnewfabric');

Route::get('/ecommercemaintenance/fabric', 'EcommerceMaintenance\FabricCompositionController@fabriccomp')->name('ecommercemaintenance.fabric');

Route::post('/ecommercemaintenance/fabricedit/{id}', 'EcommerceMaintenance\FabricCompositionController@editfabric')->name('ecommercemaintenance.editfabricdetails');

Route::post('/ecommercemaintenance/fabricdelete/{id}', 'EcommerceMaintenance\FabricCompositionController@deletefabric')->name('ecommercemaintenance.fabricdelete');

Route::post('ecommercemaintenance/fabric_activate/','EcommerceMaintenance\FabricCompositionController@fabricactivate')->name('ecommercemaintenance.fabricactivenew');

Route::post('ecommercemaintenance/fabric_deactivate/', 'EcommerceMaintenance\FabricCompositionController@fabricdeActivate')->name('ecommercemaintenance.fabricdeactivenew');


Route::post('/ecommercemaintenance/cooedit/{id}', 'EcommerceMaintenance\CountryofOriginController@editcoo')->name('ecommercemaintenance.editcoodetails');

Route::post('coo/coo_activate/','EcommerceMaintenance\CountryofOriginController@cooactivate')->name('ecommercemaintenance.cooactivenew');
 
 Route::post('coo/coo_deactivate/', 'EcommerceMaintenance\CountryofOriginController@coodeActivate')->name('ecommercemaintenance.coodeactivenew');

Route::post('zip/zip_activate/','EcommerceMaintenance\CountryofOriginController@zipactivate')->name('ecommercemaintenance.zipactivenew');
 
 Route::post('zip/zip_deactivate/', 'EcommerceMaintenance\CountryofOriginController@zipdeActivate')->name('ecommercemaintenance.zipdeactivenew');

});



Route::group(['middleware' => ['auth', 'auth.primary_user']], function() {







 Route::get('/users', 'UsersController@usersList')->name('users.user_list');







 Route::post('/add_user', 'UsersController@addUser')->name('users.add_user');







 Route::post('/users_deactivate/', 'UsersController@deActivate')->name('users.deactivate');







 Route::post('/users_activate/', 'UsersController@activate')->name('users.activate');







 Route::post('/users_delete/', 'UsersController@delete')->name('users.delete');







 Route::post('/users_select/{id}', 'UsersController@usersSelect')->name('users.select');







 Route::post('/users_customerselect/{id}', 'UsersController@usersCustomerSelect')->name('users.customersselect');


/*development users vendor*/

 Route::get('/dashboard/package/{id}/products', 'HomeController@viewproductlist')->name('users.listofproducts');


Route::post('/dashboard/package/{id}/edit', 'HomeController@ProductDevelopmentSelect')->name('productsdropdownoptions.edit');


Route::post('/dashboard/package/{id}/delete', 'HomeController@delete')->name('listofproducts.delete');


Route::post('/dashboard/package/{id}/edit', 'HomeController@FieldnamesSelect')->name('fieldnamelist.select');




Route::post('/dashboard/package/{id}', 'HomeController@updateallfieldnames')->name('users.updateallfieldnames');


Route::post('/dashboard/package/addfieldnames/{id}', 'HomeController@addFieldnames')->name('users.addfieldnames');


Route::get('/dashboard/package/{id}/productlists', 'HomeController@viewgrouplist')->name('users.viewgrouplist');


























 // Customers















/*Route::get('/add_customerpage','CustomerController@customerAddPage')->name('users.add_customerpage');







Route::post('/add_customer', 'CustomerController@addCustomer')->name('users.add_customer');







Route::post('/customers_activate/', 'CustomerController@activate')->name('customers.activate');



  



Route::post('/customers_deactivate/','CustomerController@deActivate')->name('customers.deactivate');



  



Route::post('/customers_delete/', 'CustomerController@delete')->name('customers.delete');







Route::get('/customers/{id}/edit', 'CustomerController@edit')->name('customer.edit');*/











// Products







Route::get('/producttypelist','ProductController@productTypeList')->name('users.producttypelist');







Route::get('/productlist/{typeid}', 'ProductController@productList')->name('users.productlist');







Route::get('/add_productpage/{typeid}','ProductController@productAddPage')->name('users.add_productpage');







Route::post('/add_product','ProductController@addProduct')->name('users.add_product');







Route::get('/product/{id}/prodedit','ProductController@Editproducts')->name('product.prodedit');







Route::post('/product_select/{id}', 'ProductController@ProductSelect')->name('product.select');



  



Route::post('/product_activate','ProductController@activate')->name('product.proactive');







Route::post('/product_deactivate/', 'ProductController@deActivate')->name('product.prodeactivate');







Route::post('/product_delete/', 'ProductController@delete')->name('product.delete');







Route::post('/add_sizeforproduct', 'ProductController@addSizeforProduct')->name('users.add_sizeforproduct');







Route::post('/sizecode_select/{id}', 'ProductController@sizeCodeSelect')->name('users.sizecodeselect');











//Products



//sample working on



//Route::get('/add_productspage/','ProductsController@productsAddPage')->name('users.add_productspage');



//Route::post('/add_products','ProductsController@addProducts')->name('users.add_products');







//Route::post('/add_products/{id}','ProductsController@showproductsubgroup')->name('users.showsubgroup');



//Route::post('/add_products/{id}','ProductsController@showproductsubgroup')->name('users.showsubgroup');



//Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'ProductsController@selectAjax']);















//zippercolor



 Route::get('/zippercolorlist','ZipperColorController@ZipperColorList')->name('users.zippercolorlist');



 Route::post('/zipper_activate','ZipperColorController@Zipactivate')->name('zippercolor.zipperactive');



 Route::post('/zipper_deactivate/', 'ZipperColorController@deActivate')->name('zippercolor.zipperdeactivate');



 Route::post('/zipper_delete/', 'ZipperColorController@delete')->name('zippercolor.delete');



 Route::post('/add_zippercolor/{id}', 'ZipperColorController@Zippercolor_Select')->name('zippercolor.select');



 Route::post('/add_zippercolor', 'ZipperColorController@addZipperColor')->name('zippercolor.add_zippercolor');



 Route::get('/zippercolor/{id}', 'ZipperColorController@show')->name('zipper_logo');







//pricestickercolormaintainance



Route::get('/pricestickerlist','PriceStickerController@PriceColorList')->name('users.pricestickerlist');







Route::post('/pricecoloractivate','PriceStickerController@Pricestickeractivate')->name('pricesticker.pricestickeractive');







Route::post('/pricecolordeactivate/', 'PriceStickerController@PricestickerdeActivate')->name('pricesticker.pricestickerdeactivate');







Route::post('/pricecolordelete/', 'PriceStickerController@Pricestickerdelete')->name('pricesticker.pricestickerdelete');







Route::post('/add_pricesticker', 'PriceStickerController@addPricesticker')->name('pricesticker.add_pricesticker');







Route::post('/add_pricesticker/{id}', 'PriceStickerController@Pricesticker_Select')->name('pricesticker.select');











//subbrands



 Route::get('/subbrandslist','SubBrandsController@SubBrandsList')->name('users.subbrandslist');



 



 Route::post('/subbrands_activate','SubBrandsController@Subbrandsactivate')->name('subbrands.subbrandsactive');



 



 Route::post('/subbrands_deactivate/', 'SubBrandsController@SubbrandsdeActivate')->name('subbrands.subbrandsdeactivate');



 



 Route::post('/subbrands_delete/', 'SubBrandsController@delete')->name('subbrands.delete');



 



 Route::post('/add_subbrands', 'SubBrandsController@addSubbrandscolors')->name('subbrands.add_subbrands');



  



 Route::post('/add_subbrands/{id}', 'SubBrandsController@Subbrands_Select')->name('subbrands.select');







//symobol 







 Route::get('/symbollist','SymbolController@SymbolList')->name('users.symbollist');



 



 Route::post('/add_symbollist', 'SymbolController@addSymbollist')->name('symbol.add_symbolist');



 



 Route::post('/symbolist_activate','SymbolController@Symbolactivate')->name('symbol.symbolactive');



 



 Route::post('/symbolist_deactivate/', 'SymbolController@SymboldeActivate')->name('symbol.symboldeactive');



 



 Route::post('/symbolist_delete/', 'SymbolController@delete')->name('symbol.delete');



 



 Route::post('/add_symbollist/{id}', 'SymbolController@Symbol_Select')->name('symbol.select');



 



 //fibre contents



 



    Route::get('/fibrecontentslist','FibreController@FibreContentsList')->name('users.fibrecontents');



 



    Route::post('/add_fibrelist', 'FibreController@addFibrelist')->name('fibre.add_fibrelist');



  



    Route::post('/add_fibrelist/{id}', 'FibreController@FibreContentsSelect')->name('fibrecontents.select');



   



    Route::post('/fibrelist_activate','FibreController@Fiberactivate')->name('fibrecontents.fiberactive');



	



	Route::post('/fibrelist_deactivate/', 'FibreController@FiberdeActivate')->name('fibrecontents.fiberdeactive');



	



	Route::post('/fibrelist_delete/', 'FibreController@delete')->name('fibrecontents.delete');



 



    Route::post('/fibrelist_suspend/', 'FibreController@suspend')->name('fibrecontents.suspend');







//garment component



 Route::get('/garmentcomponentlist','GarmentComponentController@GarmentComponentList')->name('users.garmentcomponent');



 



    Route::post('/add_garmentlist', 'GarmentComponentController@addGarmentlist')->name('garment.add_gramentlist');



  



    Route::post('/add_garmentlist/{id}', 'GarmentComponentController@GarmentComponentSelect')->name('garmentcomponent.select');



   



    Route::post('/garmentlist_activate','GarmentComponentController@Garmentactivate')->name('garmentcomponent.garmentactive');



	



	Route::post('/garmentlist_deactivate/', 'GarmentComponentController@GarmentdeActivate')->name('garmentcomponent.garmentdeactive');



	



	Route::post('/garmentlist_delete/', 'GarmentComponentController@delete')->name('garmentcomponent.delete');



 



    Route::post('/garmentlist_suspend/', 'GarmentComponentController@suspend')->name('garmentcomponent.suspend');



	



	//country of origin



	 Route::get('/countryoriginlist','CountryOriginController@CountryOriginList')->name('users.countryorigin');



 



    Route::post('/add_countrylist', 'CountryOriginController@addCountryOriginlist')->name('countryorigin.add_countrylist');



  



    Route::post('/add_countrylist/{id}', 'CountryOriginController@CountryOriginSelect')->name('countryorigin.select');



   



    Route::post('/countrylist_activate','CountryOriginController@CountryOriginactivate')->name('countryorigin.countryactive');



	



	Route::post('/countrylist_deactivate/', 'CountryOriginController@CountryOriginDeActivate')->name('countryorigin.countrydeactive');



	



	Route::post('/countrylist_delete/', 'CountryOriginController@delete')->name('countryorigin.delete');



 



    



// Product Sizes







Route::get('/sizes', 'SizeController@sizeList')->name('users.sizes');







Route::post('/sizes', 'SizeController@sizeHeaderSearchList')->name('users.sizesheadersearch');







Route::post('/sizecode_activate/', 'SizeController@activate')->name('users.sizecodeactivate');







Route::post('/sizecode_deactivate/', 'SizeController@deActivate')->name('users.sizecodedeactivate');







Route::post('/sizecode_delete/', 'SizeController@delete')->name('users.sizecodedelete');







Route::post('/sizecode_searchdeactivate/', 'SizeController@searchDeActivate')->name('users.sizecodesearchdeactivate');







Route::post('/add_sizecode', 'SizeController@addSizeCode')->name('users.add_sizecode');































// Ordering Routes







//printedlabels







Route::get('/printedlabels', 'PrintedlabelsController@printedlabels')->name('users.printedlabels');











Route::post('/printedlabels/{id}', 'PrintedlabelsController@printedlabelSelect')->name('printedlabels.select');







Route::post('/printedlabels_size/{id}', 'PrintedlabelsController@printedlabelsizeSelect')->name('printedlabels.sizeselect');







Route::post('/add_printedlabels', 'PrintedlabelsController@addprintedlabel')->name('printedlabels.addrecords');











Route::get('/checkout', 'PrintedlabelsController@checkoutprintedlabel')->name('printedlabels.checkout');







Route::get('/printedlabels/{id}/edit', 'PrintedlabelsController@edit')->name('printedlabels.checkoutedit');











Route::get('/printcheckout/{id}', 'PrintedlabelsController@printcheckout')->name('printedlabels.printcheckout');







//care Labels



Route::get('/carelabelist', 'CarelabelsController@carelabelList')->name('users.carelabelist');







Route::post('/carelabelist/{id}', 'CarelabelsController@carelabelSelect')->name('carelabels.select');







Route::post('/carelabelist_size/{id}', 'CarelabelsController@carelabelsizeSelect')->name('carelabels.sizeselect');







Route::post('/add_carelabels', 'CarelabelsController@addcarelabel')->name('carelabels.addrecords');







Route::get('/edit_carelabelist/{id}/edit', 'CarelabelsController@edit')->name('carelabels.edit');







Route::get('/printcarelabelcheckout/{id}', 'CarelabelsController@printcarelabelcheckout')->name('carelabels.printcheckout');







//productgroup maintenance



//marketing region



 Route::get('/productgroup','ProductGroupController@ProductGroupList')->name('users.productgroup');



 



  Route::post('/add_productgroup', 'ProductGroupController@addProductGrouplist')->name('users.add_productgroup');



  



     Route::post('/productgroup/{id}', 'ProductGroupController@ProductGroupSelect')->name('productgroup.select');



  



   Route::post('/productgroup_activate','ProductGroupController@productgroupactivate')->name('productgroup.productgroupactive');



	



	Route::post('/productgroup_deactivate/', 'ProductGroupController@productgroupdeActivate')->name('productgroup.productgroupdeactive');



	



	Route::post('/productgroup_delete/', 'ProductGroupController@delete')->name('productgroup.delete');



	



	



	//productsubgroup maintenance



 Route::get('/productsubgroup','ProductSubGroupController@ProductSubGroupList')->name('users.productsubgroup');



 



  Route::post('/add_productsubgroup', 'ProductSubGroupController@addProductSubGrouplist')->name('users.add_productsubgroup');



  



     Route::post('/productsubgroup/{id}', 'ProductSubGroupController@ProductSubGroupSelect')->name('productsubgroup.select');



  



   Route::post('/productsubgroup_activate','ProductSubGroupController@productsubgroupactivate')->name('productsubgroup.productsubgroupactive');



	



	Route::post('/productsubgroup_deactivate/', 'ProductSubGroupController@productsubgroupdeActivate')->name('productsubgroup.productsubgroupdeactive');



	



	Route::post('/productsubgroup_delete/', 'ProductSubGroupController@delete')->name('productsubgroup.delete');



	



	//producttype maintenance



	



 Route::get('/producttype','ProductTypeController@ProductTypeList')->name('users.producttype');



 



 Route::post('/add_producttype', 'ProductTypeController@addProductTypelist')->name('users.add_producttype');



 



  Route::post('/add_producttype/{id}', 'ProductTypeController@ProductTypeSelect')->name('producttype.select');



  



  Route::post('/producttype_activate','ProductTypeController@producttypeactivate')->name('producttype.producttypeactive');



	



	Route::post('/producttype_deactivate/', 'ProductTypeController@producttypedeActivate')->name('producttype.producttypedeactive');



	



	Route::post('/producttype_delete/', 'ProductTypeController@delete')->name('producttype.delete');



	



	//labels subgroup



	 Route::get('/labels_subgroup','LabelSubGroupController@LabelSubGroupList')->name('users.labelsubgroup');



 



 Route::post('/add_labels_subgroup', 'LabelSubGroupController@addLabelSubGrouplist')->name('users.add_labelsubgroup');



 



  Route::post('/add_labels_subgroup/{id}', 'LabelSubGroupController@LabelSubGroupSelect')->name('labelsubgroup.select');



  



  Route::post('/labels_subgroup_activate','LabelSubGroupController@LabelSubGroupactivate')->name('labelssubgroup.active');



	



	Route::post('/labels_subgroup_deactivate/', 'LabelSubGroupController@LabelSubGroupdeActivate')->name('labelsubgroup.deactive');



	



	Route::post('/labels_subgroup_delete/', 'LabelSubGroupController@delete')->name('labelsubgroup.delete');



	



	//typesoflabel



	Route::get('/typeoflabels','TypeofLabelsController@TypeofLabelsList')->name('users.typeoflabels');



	Route::post('/add_typeoflabels', 'TypeofLabelsController@addTypeofLabelist')->name('users.add_typeoflabels');



	



	//Route::post('/add_typeoflabels/{id}', 'TypeofLabelsController@TypeofLabelsSelect')->name('typeoflabel.select');



	



	Route::post('/add_typeoflabels/{id}', 'TypeofLabelsController@TypeofLabelsSelect')->name('users.typeoflabelselect');



	 



	 Route::post('/typeoflabels_activate','TypeofLabelsController@Labelactivate')->name('typesoflabel.active');



	Route::post('/typeoflabels_deactivate/', 'TypeofLabelsController@LabeldeActivate')->name('typesoflabel.deactive');



	    Route::post('/typeoflabels_delete/', 'TypeofLabelsController@delete')->name('typesoflabel.delete');



		 



		 



		 //typeof printlabel



		 Route::get('/typeofprintlabel','TypeofPrintLabelController@PrintLabelList')->name('users.typeofprintlabel');



		 Route::post('/add_typeofprintlabel', 'TypeofPrintLabelController@addPrintLabelist')->name('printlabel.add_typeofprintlabel');



		 



		 Route::post('/add_typeofprintlabel/{id}', 'TypeofPrintLabelController@TypeofPrintLabelSelect')->name('typesofprintlabel.printlabelselect');



		  



		   Route::post('/typeofprintlabel_activate','TypeofPrintLabelController@PrintLabelactivate')->name('typesofprintlabel.active');



	  Route::post('/typeofprintlabel_deactivate/', 'TypeofPrintLabelController@PrintLabeldeActivate')->name('typesofprintlabel.deactive');



	     Route::post('/typeofprintlabel_delete/', 'TypeofPrintLabelController@delete')->name('typesofprintlabel.delete');



		 



		 //language



		 



		  Route::get('/language','LanguageController@showLanguageList')->name('users.language');



		  



		  Route::post('/add_language', 'LanguageController@addLanguage')->name('users.add_language');



		  



		  Route::post('/add_language/{id}', 'LanguageController@LanguageSelect')->name('language.languageselect');



		  



		 Route::post('/add_language_activate','LanguageController@Languageactivate')->name('language.active');



		 



	     Route::post('/add_language_deactivate/', 'LanguageController@LanguagedeActivate')->name('language.deactive');



		 



	     Route::post('/add_language_delete/', 'LanguageController@delete')->name('language.delete');



		 



		 //orderstatus



		 



		  Route::get('/orderstatus','OrderStatusController@ShowOrderStatusList')->name('users.orderstatus');



		 



		  Route::post('/add_orderstatus', 'OrderStatusController@addOrderStatus')->name('users.addorderstatus');



		  



		  Route::post('/add_orderstatus/{id}', 'OrderStatusController@OrderStatusSelect')->name('orderstatus.orderselect');



		   



		  Route::post('/orderstatus_activate','OrderStatusController@OrderStatusactivate')->name('orderstatus.active');



		 



	     Route::post('/orderstatus_deactivate/', 'OrderStatusController@OrderStatusdeActivate')->name('orderstatus.deactive');



		 



	     Route::post('/orderstatus_delete/', 'OrderStatusController@delete')->name('orderstatus.delete');



		 



		 //new products new design



		 



		 Route::get('/newproducts', 'NewProductsController@NewProductlistview')->name('user.newproducts');



		 



		 Route::post('/add_newproducts','NewProductsController@addnewProducts')->name('user.addnewProducts');



		 



		// Route::post('/add_newproducts','NewProductsController@addnewProducts')->name('user.addnewProducts');



		 //Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'NewProductsController@selectAjax']);



		 



		// Route::post('select-ajax','NewProductsController@selectAjax')->name('user.select-ajax');



		 //Route::get('newproducts',array('as'=>'add_newproducts','uses'=>'NewProductsController@myform'));



		 //Route::get('add_newproducts/ajax/{id}',array('as'=>'add_newproducts.ajax','uses'=>'NewProductsController@myformAjax'));



 // Route::get('newproducts/ajax/{id}','NewProductsController@myformAjax');



 



  Route::get('/add_newproducts/{id}','NewProductsController@Selectheattransfer')->name('user.Selectheattransfer');



  



  Route::get('add_heattransfer/{id}','NewProductsController@addheattransfer')->name('user.Addheattransfer');



  



  Route::get('add_patches/{id}','NewProductsController@addpatches')->name('user.Addpatches');



  



  Route::get('select_wovendetails/{id}','NewProductsController@Selectwoven')->name('user.Selectwoven');



   



  Route::get('add_woven/{id}','NewProductsController@Addwoven')->name('user.addwoven');



  



  Route::get('add_hangtags/{id}','NewProductsController@AddHangtags')->name('user.addhangtags');



  



  Route::get('Select_hangtag/{id}','NewProductsController@SelectHangtag')->name('user.Selecthangtags');



  



  



  Route::get('add_zipperpulls/{id}','NewProductsController@AddZipperPulls')->name('user.addzipperpulls');



  



  /*New design uniquegroup*/



  

  //Route::get('/productdetails','ProductsController@Productlistview')->name('user.products');
  
  Route::get('/productdetails/{id}','ProductsController@Productlistview')->name('user.products');
  
  Route::get('/productdetails/{id}/edit','ProductsController@Edit')->name('product.productdetailsedit');
  
   Route::get('/productdetails/ajax/{id}','ProductsController@myformAjax');
  
 
   
   Route::post('/update_productsdetails','ProductsController@Addproductsdetails')->name('user.update_productsdetails');
   
   
    Route::get('update_productsdetails/ajax/{id}','ProductsController@uniquefactoryselectionAjax');
  
  //Defect: 
         //Name: Vidya-Uniquegroup Team
         //Desc. Productdetails depends upon customer change to ware house details
		 
     Route::post('/productdetails/{id}/changehouse','ProductsController@selectwarehouse')->name('user.selectcustomer');
         
  
  
  
  /*new development list*/
  Route::get('/developmentlist','DevelopmentListController@developmentlistview')->name('user.developmentlist');

 
    //Route::get('/productimg/{id}', 'ProductsController@getproductimg')->name('user.productpic');
	
	 Route::post('/developmentlist_delete/{id}', 'DevelopmentListController@delete')->name('user.developmentlistdelete');

  Route::get('/viewdevelopment/{id}','DevelopmentListController@viewdevelopmentlist')->name('user.developmentproductdetails');
  
  //sathish 30-03-2018
  Route::get('/downloadpdfdevelopment/{id}','DevelopmentListController@dowloadpdfviewdevelopment')->name('user.developmentproductdetails1');
  
  
   //Defect:04-04-2018
   //Name: Bala-Uniquegroup Team
   //Desc.Development Item list- click view to show pdf on seperate products
   
 Route::get('/downloadpdfdevelopmentitemlist/{id}/{typeid}','DevelopmentItemListController@dowloadpdfviewdevelopment')->name('user.pdfdevelopmentitemlist');


 
 Route::get('/duplicatedevelopment/{id}','DevelopmentListController@developmentlistduplicate')->name('user.developmentlistduplicate');
  
  // new development Item List
  Route::get('/developmentitemlist','DevelopmentItemListController@developmentlistviewdetails')->name('user.developmentlistview');
    Route::get('/productimg/{id}', 'DevelopmentItemListController@getproductimg')->name('user.productpic');
	
	Route::get('/productboximg/{id}', 'DevelopmentItemListController@getboximg')->name('user.boxpic');

    Route::get('/producthangimg/{id}', 'DevelopmentItemListController@gethangimg')->name('user.hangtagpic');

    Route::get('/producttapeimg/{id}', 'DevelopmentItemListController@gettapeimg')->name('user.tapespic');

    Route::get('/productzipperimg/{id}', 'DevelopmentItemListController@getzipperimg')->name('user.zipperpic');

    Route::get('/productimgtissue/{id}', 'DevelopmentItemListController@gettissueimg')->name('user.productpictissue');

    Route::get('/productimghook/{id}', 'DevelopmentItemListController@gethookimg')->name('user.producthookpic');

    Route::get('/productimgpackage/{id}', 'DevelopmentItemListController@getpackageimg')->name('user.productpicpackage');
	
	Route::get('/productimgproducts/{id}', 'ProductsController@getproductimg')->name('user.productimagepic');

  //sathish 27-03-2018 add heattransferimage
    Route::get('/heattransferimg/{id}', 'DevelopmentItemListController@getheattransferimg')->name('user.heattransferpic');
	
	//sathish 27-03-2018 add wovenimage
    Route::get('/wovenlabelimg/{id}', 'DevelopmentItemListController@getwovenimg')->name('user.wovenlabelpic');
    //sathish 28-03-2018 add printedLabelimage
    Route::get('/printedlabelimg/{id}', 'DevelopmentItemListController@getprintedlabelimg')->name('user.printedlabelpic');

  Route::get('/viewdevelopmentitemlist/{id}/{typeid?}/{productid?}','DevelopmentItemListController@viewdevelopmentitemlist')->name('user.developmentitemproductdetails');

  /* Rajesh:01032018  */
  Route::get('/editdevelopmentitemlist/{id}/{typeid?}','DevelopmentItemListController@editdevelopmentitemlist')->name('user.editdevelopmentitemproductdetails');
  
  
  Route::post('/updateitemlist','DevelopmentItemListController@updateitemlist')->name('user.updateitemlist');
	Route::post('/updateboxitemlist','DevelopmentItemListController@updateboxitemlist')->name('user.updateboxitemlist');

   /* Rajesh:01032018 Ends */

   // Name: New design for product details

  Route::get('/accounts_productdetails/{id}', 'ProductsController@pdmdetaildevlopment')->name('users.productdetaildevelopmenthome');

  Route::get('/getproductdetails/{productgroup}/{productsubgroupid?}','ProductsController@getproductdetailsitemlist')->name('user.getproductdetails');


Route::post('/add_processproductsdetails','ProductsController@Addprocessproductsdetails')->name('user.add_processproductsdetails');
Route::post('/update_processproductsdetails','ProductsController@Updateprocessproductsdetails')->name('user.update_processproductsdetails');

Route::get('/editproductdetails/{id}/edit','ProductsController@Editproductlist')->name('product.productlistdetailsedit');

Route::get('/currentorder','OrderController@orderlistview')->name('user.orderlistview');
Route::get('/placeorderlist','OrderController@placeorderview')->name('user.placeorderview');
Route::get('/completeorder','OrderController@completeorderlistview')->name('user.completeorderlistview');

Route::get('/placeorder/{id}', 'OrderController@placeordermaintenance')->name('order.placeorder');
Route::get('/zipercolorimg/{id}', 'OrderController@gezippercolorimg')->name('product.zippercolor');

Route::get('/symboltype/{id}', 'OrderController@getsymbolimg')->name('product.symbolcolor');
Route::get('/getzippercolorId/ajax/{id}', 'OrderController@getproductzippercolorid')->name('product.productzippercolorid');
Route::get('/getcaredetails/ajax/{id}', 'OrderController@getcaredetails')->name('order.getcaredetails');
Route::get('/getfabricdetails/ajax/{id}', 'OrderController@getfabricdetails')->name('order.getfabricdetails');
Route::post('/order/addneworder', 'OrderController@addneworder')->name('order.addneworder');

Route::get('/order/checkout', 'OrderController@checkout')->name('order.checkout');
Route::get('/order/delivery/instruction', 'OrderController@deliveryinstruction')->name('order.delivery');
Route::get('/order/address', 'OrderController@deliveryaddresssave')->name('order.addressdelivery');

Route::get('/order/billaddress', 'OrderController@billaddresssave')->name('order.addressbill');

Route::get('/order/deliverymethod', 'OrderController@deliverymethodsave')->name('order.deliverymethodorder');

Route::get('/order/deliveryaccount', 'OrderController@deliveryaccountsave')->name('order.deliveryaccount');
/*vidhya:06-04-2014*/
Route::get('/order/deliveryaddressdelete', 'OrderController@deliveryaddressdel')->name('order.deletedeliveryadddress');

Route::get('/order/billaddressdelete', 'OrderController@billaddressdel')->name('order.deletebilladddress');

Route::get('/order/deliverymethoddelete', 'OrderController@deliverymethoddel')->name('order.deletedeliverymethod');

Route::get('/order/deliveryaccountdelete', 'OrderController@deliveryaccountdel')->name('order.deletedeliveryaccount');

Route::post('/order/adddeliveryins', 'OrderController@deliveryinstructionadd')->name('order.deliveryinstruction');

Route::get('/order/remove/{id}', 'OrderController@removeOrder')->name('order.remove');
Route::get('/order/edit/{id}', 'OrderController@editOrder')->name('order.edit');
  //Route::get('/getcaredetails/{productgroup}/{productsubgroupid?}','CareController@getproductdetailsitemlist')->name('user.getcaredetails');
//to get size and coo 
//By rajesh 24032018
Route::get('/getcaredetails/{type}/{co?}','CareController@getcaredetails')->name('user.getcaredetails');

Route::get('/sizemaintenancedetails/{type}/{co?}','CareController@getsizemaintenancedetails')->name('user.getsizemaintenancedetails');

Route::get('/getcareimg/{value}/{caretype?}', 'CareController@getcareimg')->name('user.getcarepic');
Route::get('/getgarmentfabric/{language}', 'CareController@getfabricdetails')->name('user.getfabricdetail');


Route::get('/productmaintenance/zippercolor/{id}', 'Admin\OrderController@gezippercolorimg')->name('product.zippercolorimg');

Route::post('/productmaintenance/addzipperpullercolor','ProductMaintenance\ZipperColorController@zippercoloradd')->name('product.addnewzippercolor');


Route::post('/productmaintenance/zippercoloredit/{id}', 'ProductMaintenance\ZipperColorController@editzippercolor')->name('product.editzippercolor');

Route::post('/productmaintenance/zippercolordelete/{id}', 'ProductMaintenance\ZipperColorController@deletezippercolor')->name('product.zippercolordelete');

Route::post('zip/zip_activate/','ProductMaintenance\ZipperColorController@zipactivate')->name('product.zipactivenew');
 
 
Route::post('zip/zip_deactivate/', 'ProductMaintenance\ZipperColorController@zipdeActivate')->name('product.zipdeactivenew');
//New design ends
   
    //Defect:
         //Name: Bala-Uniquegroup Team
         //Desc. when hooks production region as  change to select unique factory.
   
   //Route::get('test/ajax/{id}','ProductsController@uniquefactoryselectionAjax');
   
   
   
   


    Route::post('/developmentitemlist_delete/{id}', 'DevelopmentItemListController@delete')->name('user.developmentitemlistdelete');


   Route::post('/developmentitemlisthook_delete/{id}/{productid?}', 'DevelopmentItemListController@deletehook')->name('user.developmentitemlistdeletehook');

   Route::post('/developmentitemlisttissue_delete/{id}/{producttid?}', 'DevelopmentItemListController@deletetissue')->name('user.developmentitemlistdeletetissue');

   Route::post('/developmentitemlistpackage_delete/{id}/{productpid?}', 'DevelopmentItemListController@deletepackage')->name('user.developmentitemlistdeletepackage');

   Route::post('/developmentitemlisttape_delete/{id}/{productpid?}', 'DevelopmentItemListController@deletetapes')->name('user.developmentitemlistdeletetapes');

   Route::post('/developmentitemlistzipper_delete/{id}/{productpid?}', 'DevelopmentItemListController@deletezipper')->name('user.developmentitemlistdeletezipper');

   Route::post('/developmentitemlisthangtags_delete/{id}/{productpid?}', 'DevelopmentItemListController@deletehangtags')->name('user.developmentitemlistdeletehangtags');

   /*vidhya:09-04-2018*/


   Route::post('/developmentitemlistheat_delete/{id}/{productpid?}', 'DevelopmentItemListController@deleteheat')->name('user.developmentitemlistdeleteheat');

   Route::post('/developmentitemlistprinted_delete/{id}/{productpid?}', 'DevelopmentItemListController@deleteprintedlabel')->name('user.developmentitemlistdeleteprintedlab');

   Route::post('/developmentitemlistwovwn_delete/{id}/{productpid?}', 'DevelopmentItemListController@deletewoven')->name('user.developmentitemlistdeletewoven');

    Route::get('/duplicatedevelopmentitem/{id}/{duplicateid?}/{hookid?}','DevelopmentItemListController@developmentitemlistduplicate')->name('user.developmentitemlistduplicate');
  
  
  

   //Route::get('newproducts/ajax/{id}','ProductsController@myformAjax');

  // Route::post('/add_products','ProductsController@Addproducts')->name('user.add_products');

   Route::post('/add_productsdetails','ProductsController@Addproductsdetails')->name('user.add_productsdetails');

   Route::get('add_productsdetails/ajax/{id}','ProductsController@uniquefactoryselectionAjax');
   
   
  
   
   
   
  
   
  Route::post('/add_productsgroupdetails','ProductsController@AddProductsGroupdetails')->name('user.add_productsgroupdetails');

	 Route::get('/add_season','ProductsController@AddSeasondetails')->name('user.add_season');
	 
	 Route::get('/add_quantity','ProductsController@AddQuantitydetails')->name('user.add_quantity');

	  Route::get('/add_region','ProductsController@AddRegiondetails')->name('user.add_region');


       //inventorydetails
	   
	    Route::post('/add_inventorydetails','ProductsController@Addinventorydetails')->name('user.add_inventorydetails');
		
		Route::post('/add_productquoteinfo','ProductsController@Addproductquoteinfo')->name('user.add_productquoteinfo');
		
		Route::post('/add_costinfo','ProductsController@Addcostdetails')->name('user.add_costdetails');

	    Route::post('/add_costingandrequirements','ProductsController@AddCostingandRequirements')
		->name('user.add_costingandrequirements');
		
		
		
	  //hook,tissuepaper,packagingstickers
	  
	  
	  //Route::post('/addproductgroups','ProductGroupsController@AddProductGroupslist')-> name('users.addproductgroups');
	  
	   Route::post('/addproductgroups','ProductGroupsController@AddProductGroupshooklist')-> name('user.addproductgroups');
	  
//Route::post('/addproductgroupstissuepaper','ProductGroupsController@AddProductsubgrouptissuepaper')-> name('user.addtissuepaperdetails');



	  //Route::post('/add_region','ProductsController@AddRegiondetails')->name('user.add_region');



	  



	  //Route::get('add_region/{id}','ProductsController@AddRegiondetails');



	  



	  Route::get('add_products/{id}','ProductsController@version');



	  



	   Route::post('/add_productsgroupdetails1','ProductsController@Addproductsdetails')->name('user.add_productsdetails1');


/*Email-controller*/
  Route::get('sendemail/{id}', 'MailController@index')->name('user.email_template');
	   
	   Route::get('sendseperateemail/{id}/{typeid}', 'MailController@seperateproducts_editItemlist')->name('user.email_template_seperateproducts');
  
      //Route::post('sendproductemaildetails','MailController@sendemailconcepts')->name('user.sendproductemaildetails');
	  Route::post('sendbasicemail','MailController@basic_email')->name('user.sendbasicemail');
	  
	  
	  
	  Route::post('sendhtmlemail/{id}','MailController@html_email')->name('user.sendhtmlemail');
	  
	   Route::post('sendseperateproducts/{id}/{typeid}','MailController@sendseperateproductsdetails')->name('user.sendseperateproducts');
	  
	   Route::get('send_customerserviceconfirmtoac/{id}','MailController@send_customerserviceconfirmtoac')->name('user.send_customerserviceconfirmtoac');
     
	  
	  
	  
	  //approve and reject url
	  
	  //Route::get('activation','MailController@activateartwork')->name('user.activation');
	  
	   Route::get('sendpdf','DefaultController@index');
	   






});







/*Route::get('app/data/product/{filename}', function($filename)



{



    $filePath = storage_path().'/app/data/product/'.$filename;







    if ( ! File::exists($filePath) or ( ! $mimeType = getImageContentType($filePath)))



    {



        return Response::make("File does not exist.", 404);



    }







    $fileContents = File::get($filePath);







    return Response::make($fileContents, 200, array('Content-Type' => $mimeType));



});*/



?>
