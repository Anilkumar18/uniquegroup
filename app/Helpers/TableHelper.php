<?php

if (!function_exists('base64image')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function base64image($filename)
    {

        $path = storage_path('app/' . $filename);
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}

if (!function_exists('table_url')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function table_url($routeName, $field, $currentDir, $search)
    {
      $sort = 'asc';
      if ($currentDir == 'asc') {
        $sort = 'desc';
      }
      $params = ['sort' => $sort, 'field' => $field];
      if ($search != null && $search != '') {
        $params['search'] = $search;
      }
      return route($routeName, $params);
    }
}

if (!function_exists('table_sort_class')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function table_sort_class($field, $currentSort, $currentDir)
    {
      $result = '';
      if ($field == $currentSort) {
        if ($currentDir == 'asc') {
          $result = '-asc';
        }
        else {
          $result = '-desc';
        }
      }
      return $result;
    }

    function example($key){
return App\Http\Controllers\Admin\AcuantSubmissions::test($key);
}
}

function getImageContentType($file)
{
    $mime = exif_imagetype($file);

    if ($mime === IMAGETYPE_JPEG) 
        $contentType = 'image/jpeg';

    elseif ($mime === IMAGETYPE_GIF)
        $contentType = 'image/gif';

    else if ($mime === IMAGETYPE_PNG)
        $contentType = 'image/png';

    else
        $contentType = false;

    return $contentType;
}
function getCountryName($id){
return App\Http\Controllers\Admin\CustomerController::getCountryName($id);
}
