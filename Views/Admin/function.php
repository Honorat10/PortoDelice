<?php
function valideArray(array $array, array $champs){
    foreach ($champs as $champ) {
        if (!isset($array[$champ]) || empty($array[$champ])) {
            return false;
        }
        $array[$champ] =  strip_tags($array[$champ]);
    }
    return true;
}
function readAll(string $statement){
    require './config.php';
    $readquery=$bd->query($statement);
   return $readquery->fetchAll(PDO::FETCH_OBJ);
}
function showmeal(array $data ) {
    $row = '';
  foreach ($data as $view) {
      $row .= ' <tr>
      <th scope="row">'.$view->nom.'</th>
      <th scope="row">'.substr($view->description,0,30).'</th>
      <th scope="row">'.$view->temps.'</th>
      <th scope="row">'.$view->prix.'</th>
      <th scope="row"><img src="'.$view->miniature.'" alt="" style="width: 40px;height:40px;border-radius:150px"></th>
      <td>
<a href=""> <i class="feather icon-plus" style="color: green; border:1px solid;padding: 5px;  margin-left: 5px;box-shadow: 1px 1px 1px;"></i></a>
<a href="platupdate.php?mod='.$view->id.'">  <i class="feather icon-edit" style="color: blue; border:1px solid;padding: 5px ; margin-left: 5px;box-shadow: 1px 1px 1px;" ></i></a>
<a href="plat.php?num='.$view->id.'"><i class="feather icon-delete" style="color: red; border:1px solid;padding: 5px ; margin-left: 5px;box-shadow: 1px 1px 1px;"></i></a>
         
        
          
      </td>
  </tr>';
  }
  return $row;
}
function showorder(array $data ) {
    $row = '';
  foreach ($data as $view) {
      $row .= ' <tr>
      <th scope="row">'.$view->nom.'</th>
      <th scope="row">'.$view->adresse.'</th>
      <th scope="row">'.$view->numero.'</th>
      <th scope="row">'.$view->plat.'</th>
      <th scope="row">'.$view->prix.'</th>
      <td>
<a href=""> <i class="feather icon-plus" style="color: green; border:1px solid;padding: 5px;  margin-left: 5px;box-shadow: 1px 1px 1px;"></i></a>
<a href="platupdate.php?mod='.$view->id.'">  <i class="feather icon-edit" style="color: blue; border:1px solid;padding: 5px ; margin-left: 5px;box-shadow: 1px 1px 1px;" ></i></a>
<a href="plat.php?num='.$view->id.'"><i class="feather icon-delete" style="color: red; border:1px solid;padding: 5px ; margin-left: 5px;box-shadow: 1px 1px 1px;"></i></a>
         
        
          
      </td>
  </tr>';
  }
  return $row;
}
function show(array $data ) {
    $row = '';
  foreach ($data as $view) {
      $row .= ' <tr>
      <th scope="row">'.$view->nom.'</th>
      <td>
          <i class="feather icon-plus" style="color: green; border:1px solid;padding: 5px;  margin-left: 5px;box-shadow: 1px 1px 1px;"></i>
        
          <a href="categorieupdate.php?id='.$view->id.'">  <i class="feather icon-edit" style="color: blue; border:1px solid;padding: 5px ; margin-left: 5px;box-shadow: 1px 1px 1px;" ></i></a>
          <a href="categorie.php?num='.$view->id.'">  <i class="feather icon-delete" style="color: red; border:1px solid;padding: 5px ; margin-left: 5px;box-shadow: 1px 1px 1px;"></i></a>
      </td>
  </tr>
';
  }
  return $row;
}
function delete(int $id){
    require './config.php';
    $del = $bd->query("DELETE FROM plat WHERE id = $id");
    if($del){
        header('location:./plat.php');
    }
}
function deleteca(int $id){
    require './config.php';
    $del = $bd->query("DELETE FROM categorie WHERE id = $id");
    if($del){
        header('location:./categorie.php');
    }
}