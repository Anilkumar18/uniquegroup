<?php $pageurlarray=explode('/', Request::fullUrl());?>
@if($usertype->id == 2 || $usertype->id == 17 || $usertype->id == 8  || $usertype->id == 16)
<?php
$productarray=array('dashboard','currentorder','completeorder');
if (array_intersect($pageurlarray, $productarray)) {
}else{
echo $getUserRoleName=\App\UserRole::getUserRoleNameByID();

}
?>
@elseif($usertype->id == 10 || $usertype->id == 14)
<?php
$productarray=array('developmentlist','developmentitemlist','currentorder','completeorder','dashboard','editdevelopmentitemlist','editproductdetails');
if (array_intersect($pageurlarray, $productarray)) {
}else{
echo $getUserRoleName=\App\UserRole::getUserRoleNameByID();

}
?>
@elseif($usertype->id == 15)
<?php
$productarray=array('placeorder','currentorder','completeorder','dashboard');
if (array_intersect($pageurlarray, $productarray)) {
}else{
echo $getUserRoleName=\App\UserRole::getUserRoleNameByID();

}?>
@elseif($usertype->id == 12)
<?php
$productarray=array('developmentlist','developmentitemlist','placeorder','currentorder','completeorder','dashboard');
if (array_intersect($pageurlarray, $productarray)) {
}else{
echo $getUserRoleName=\App\UserRole::getUserRoleNameByID();

}?>
@endif