<?php

//action.php

// local connection database
$connect = new PDO("mysql:host=localhost;dbname=cas", "root", "");

// certain server connection database (example)
// $connect = new PDO("mysql:host=sql211.epizy.com;dbname=epiz_29750722_cas", "epiz_29750722", "gECPTCpEMdkhm");

$received_data = json_decode(file_get_contents("php://input"));
$data = array();

// sortby without any option selected
if($received_data->action == 'sortdata' && $received_data->sortby == null)
{    
 $query = "
 SELECT * FROM tbl_sample 
 ORDER BY id DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

// sortby an options
if($received_data->action == 'sortdata' && $received_data->sortby != null)
{    
 $query = "
 SELECT * FROM tbl_sample 
 WHERE hobby = '".$received_data->sortby."'
 ORDER BY id DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

// unlink action
if($received_data->action == 'unlink')
{
  $query = "
  SELECT * FROM report 
  WHERE img = '".$received_data->img."' OR
  img1 = '".$received_data->img."' OR
  img2 = '".$received_data->img."'
  ";

  $statement = $connect->prepare($query);

  $statement->execute();

  $row_count = $statement->rowCount();

  if($row_count == 0) {
    unlink($received_data->img);
  }

  $output = array(
    'message' => 'Gambar berhasil dihapus!'
   );
  
   echo json_encode($output);
}

// unlinkAmbulan action
if($received_data->action == 'unlinkAmbulan')
{
  $query = "
  SELECT * FROM galery 
  WHERE img = '".$received_data->img."'
  ";

  $statement = $connect->prepare($query);

  $statement->execute();

  $row_count = $statement->rowCount();

  if($row_count == 0) {
    unlink($received_data->img);
  }

  $output = array(
    'message' => 'Gambar berhasil dihapus!'
   );
  
   echo json_encode($output);
}

// report action
if($received_data->action == 'report')
{
 $query = "
 SELECT * FROM report 
 WHERE flag = 1
 ORDER BY tanggal DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

// ongoing action
if($received_data->action == 'ongoing')
{
 $query = "
 SELECT * FROM report 
 WHERE flag = 0
 ORDER BY tanggal DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

// fetchall action
if($received_data->action == 'fetchall')
{
 $query = "
 SELECT * FROM report 
 ORDER BY tanggal DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

// fetchallAmbulan action
if($received_data->action == 'fetchallAmbulan')
{
 $query = "
 SELECT * FROM galery 
 ORDER BY tipe DESC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 while($row = $statement->fetch(PDO::FETCH_ASSOC))
 {
  $data[] = $row;
 }
 echo json_encode($data);
}

// insert action
if($received_data->action == 'insert')
{
 $data = array(
  ':tanggal' => $received_data->tanggal,
  ':jemput' => $received_data->jemput,
  ':tujuan' => $received_data->tujuan,
  ':pasien' => $received_data->pasien,
  ':usia' => $received_data->usia,
  ':status' => $received_data->status,
  ':unit' => $received_data->unit,
  ':plat' => $received_data->plat,
  ':jam' => $received_data->jam,
  ':rute' => $received_data->rute,
  ':pilot' => $received_data->pilot,
  ':copilot' => $received_data->copilot,
  ':cp' => $received_data->cp,
  ':flag' => $received_data->flag,
  ':img' => $received_data->img,
  ':img1' => $received_data->img1,
  ':img2' => $received_data->img2
 );

 $query = "
 INSERT INTO `report`
 (`tanggal`, `jemput`, `tujuan`, `pasien`, `usia`, `status`, `unit`, `plat`, `jam`, `rute`, `pilot`, `copilot`, `cp`, `flag`, `img`, `img1`, `img2`) 
 VALUES (:tanggal, :jemput, :tujuan, :pasien, :usia, :status, :unit, :plat, :jam, :rute, :pilot, :copilot, :cp, :flag, :img, :img1, :img2)
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Data berhasil ditambahkan!'
 );

 echo json_encode($output);
}

// insertAmbulan action
if($received_data->action == 'insertAmbulan')
{
 $data = array(
  
  ':tipe' => $received_data->tipe,
  ':unit' => $received_data->unit,
  ':plat' => $received_data->plat,
  ':img' => $received_data->img,
 );

 $query = "
 INSERT INTO `galery`
 (`tipe`, `unit`, `plat`, `img`) 
 VALUES (:tipe, :unit, :plat, :img)
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Galeri berhasil ditambahkan!'
 );

 echo json_encode($output);
}

// fetchSingle action
if($received_data->action == 'fetchSingle')
{
 $query = "
 SELECT * FROM report 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['tanggal'] = $row['tanggal'];
  $data['jemput'] = $row['jemput'];
  $data['tujuan'] = $row['tujuan'];
  $data['pasien'] = $row['pasien'];
  $data['usia'] = $row['usia'];
  $data['status'] = $row['status'];
  $data['unit'] = $row['unit'];
  $data['plat'] = $row['plat'];
  $data['jam'] = $row['jam'];
  $data['rute'] = $row['rute'];
  $data['pilot'] = $row['pilot'];
  $data['copilot'] = $row['copilot'];
  $data['cp'] = $row['cp'];
  $data['flag'] = $row['flag'];
  $data['img'] = $row['img'];
  $data['img1'] = $row['img1'];
  $data['img2'] = $row['img2'];
 }

 echo json_encode($data);
}

// fetchSingleAmbulan action
if($received_data->action == 'fetchSingleAmbulan')
{
 $query = "
 SELECT * FROM galery 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $result = $statement->fetchAll();

 foreach($result as $row)
 {
  $data['id'] = $row['id'];
  $data['tipe'] = $row['tipe'];
  $data['unit'] = $row['unit'];
  $data['plat'] = $row['plat'];
  $data['img'] = $row['img'];
 }

 echo json_encode($data);
}

// update action
if($received_data->action == 'update')
{
 if($received_data->img != "" && $received_data->del_img != "" && $received_data->img != $received_data->del_img) {
   unlink($received_data->del_img);
 }
 if($received_data->img1 != "" && $received_data->del_img1 != "" && $received_data->img1 != $received_data->del_img1) {
   unlink($received_data->del_img1);
 }
 if($received_data->img2 != "" && $received_data->del_img2 != "" && $received_data->img2 != $received_data->del_img2) {
   unlink($received_data->del_img2);
 }

 $data = array(
    ':id' => $received_data->id,
    ':tanggal' => $received_data->tanggal,
    ':jemput' => $received_data->jemput,
    ':tujuan' => $received_data->tujuan,
    ':pasien' => $received_data->pasien,
    ':usia' => $received_data->usia,
    ':status' => $received_data->status,
    ':unit' => $received_data->unit,
    ':plat' => $received_data->plat,
    ':jam' => $received_data->jam,
    ':rute' => $received_data->rute,
    ':pilot' => $received_data->pilot,
    ':copilot' => $received_data->copilot,
    ':cp' => $received_data->cp,
    ':flag' => $received_data->flag,
    ':img' => $received_data->img,
    ':img1' => $received_data->img1,
    ':img2' => $received_data->img2
 );

 $query = "
 UPDATE `report` 
 SET `tanggal`=:tanggal,
 `jemput`=:jemput,
 `tujuan`=:tujuan,
 `pasien`=:pasien,
 `usia`=:usia,
 `status`=:status,
 `unit`=:unit,
 `plat`=:plat,
 `jam`=:jam,
 `rute`=:rute,
 `pilot`=:pilot,
 `copilot`=:copilot,
 `cp`=:cp,
 `flag`=:flag,
 `img`=:img,
 `img1`=:img1,
 `img2`=:img2
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Data berhasil diperbarui!'
 );

 echo json_encode($output);
}

// updateAmbulan action
if($received_data->action == 'updateAmbulan')
{
 if($received_data->img != "" && $received_data->del_img != "" && $received_data->img != $received_data->del_img) {
   unlink($received_data->del_img);
 }

 $data = array(
    ':id' => $received_data->id,
    ':tipe' => $received_data->tipe,
    ':unit' => $received_data->unit,
    ':plat' => $received_data->plat,
    ':img' => $received_data->img    
 );

 $query = "
 UPDATE `galery` 
 SET `tipe`=:tipe,
 `unit`=:unit,
 `plat`=:plat,
 `img`=:img
 WHERE id = :id
 ";

 $statement = $connect->prepare($query);

 $statement->execute($data);

 $output = array(
  'message' => 'Galeri berhasil diperbarui!'
 );

 echo json_encode($output);
}

// delete action
if($received_data->action == 'delete')
{
  if($received_data->img != "") {
    unlink($received_data->img);
  }

  if($received_data->img1 != "") {
    unlink($received_data->img1);
  }

  if($received_data->img2 != "") {
    unlink($received_data->img2);
  }

 $query = "
 DELETE FROM report 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Data berhasil dihapus!'
 );

 echo json_encode($output);
}

// deleteAmbulan action
if($received_data->action == 'deleteAmbulan')
{
  if($received_data->img != "") {
    unlink($received_data->img);
  }

 $query = "
 DELETE FROM galery 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = array(
  'message' => 'Galeri berhasil dihapus!'
 );

 echo json_encode($output);
}

// signup action
if($received_data->action == 'signup')
{
 $data = array(
  ':name' => $received_data->name,
  ':email' => $received_data->email,
  ':pass' => $received_data->pass
 );
 
 $query = "
 SELECT * FROM user 
 WHERE email = '".$received_data->email."'
 ";
 $statement = $connect->prepare($query);

 $statement->execute();

 $row_count = $statement->rowCount();
 
 if ($row_count > 0) {
    $output = array(
        'message' => 'Email sudah terdaftar!'
    );
 } else {
    $query = "
    INSERT INTO user 
    (name, email, pass) 
    VALUES (:name, :email, :pass)
    ";
   
    $statement = $connect->prepare($query);
   
    $statement->execute($data);
   
    $row_count = $statement->rowCount();

    $output = array(
     'baris' => $row_count,
     'message' => 'Registrasi akun berhasil!'
    );
   
 }
 echo json_encode($output);
}

// login action
if($received_data->action == 'login')
{
 $query = "
 SELECT * FROM user 
 WHERE email = '".$received_data->email."' 
 ";

 $statement = $connect->prepare($query);

 $statement->execute();

 $row_count = $statement->rowCount();

 if($row_count > 0) {

  $result = $statement->fetchAll();

  foreach($result as $row)
  {
   $data['id'] = $row['id'];
   $data['name'] = $row['name'];
   $data['email'] = $row['email'];
   $data['pass'] = $row['pass'];
  }

  if($data['pass'] == $received_data->pass) {
    $output = array(
      'user' => $data,
      'message' => 'Login berhasil!'
    );
    echo json_encode($output);
    
    // echo json_encode($data);
  } else {
    $output = array(
      'message' => 'Password salah!'
    );
    
    echo json_encode($output);
  }

 } else {
   $output = array(
    'message' => 'Email tidak terdaftar!'
   );
  
   echo json_encode($output);
 }
 
}

?>