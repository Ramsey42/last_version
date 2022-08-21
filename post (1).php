<?php

include "classes/main.php";
include "classes/productMain.php";
include "classes/diskClass.php";
include "classes/furnitureClass.php";
include "classes/bookClass.php";
include "classes/validatorClass.php";


class post
{
  // SANAZTIZING DATA
  public function sanatize($data)
  {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
  }
  // DATA HANDLING
  public function dataHandeling()
  {
$servername = "us-cdbr-east-06.cleardb.net";
$username = "b43edf0c48809a";
$password = "2f3b2e65";
$dbName = "heroku_cc80a156c2a249c";
// Create connection

$conn = new mysqli($servername, $username, $password, $dbName);
if (isset($_POST["productType"]) && isset($_POST["Save"])) {
  $sku = $_POST['Sku'];


  $sql_u = "SELECT * FROM products WHERE Sku='$sku'";
 
  $res_u = mysqli_query($conn, $sql_u);


  if (mysqli_num_rows($res_u) > 0) {
 
 header("location:wrongsku.php?status=success");
  } else {
    
      $post = new post();
      $productType = $post->sanatize($_POST["productType"]);
      $sku = $post->sanatize($_POST['Sku']);
      $name = $post->sanatize($_POST['Name']);
      $price = $post->sanatize($_POST['Price']);

      $validation = new UserValidator($sku, $name, $price, $productType);
      $errors = $validation->validateForm();

      if (count($errors) <= 0) {

        $productData = null;
        $attribute = "";
        $availableProducts = ["DVD", "Furniture", "Book"];

        if (in_array($productType, $availableProducts)) {

          $productData = new $productType($sku, $name, $price, $productType, "");
          $lisAttributes = $productData->getListAttribute();

          foreach ($lisAttributes as $att) {
            $attribute .= isset($_POST[$att]) ? " " . $att . ": " . $_POST[$att] . ", " : "";
          }

          $productData->setAttribute($post->sanatize($attribute));

          $productData->addPost();

          header("location:index.php?status=success");
        }

        // VALIDATION

      } 
    }
  }
  }
  
    
  // DELETING DATA
  public function deleteFunction()
  {
    if (isset($_POST['delete'])) {
      $productData = new ProductMain();
      $id = $_POST['ProductID'];
      $N = count($id);
      for ($i = 0; $i < $N; $i++) {
        $productData->delPost($id[$i]);
      }

      header("location:index.php?status=deleted");
    }
    
  }
}
$post =  new post();
$post->dataHandeling();
$post->deleteFunction();

