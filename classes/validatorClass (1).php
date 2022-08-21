<?php

class UserValidator
{
  // INITIALISING PROPERTIES

  private $Sku, $Name, $Price, $ProductType;
  private $errors = [];

  // CONSTRUCTING PROPERTIES

  public function __construct($sku, $name, $price, $productType)
  {
    $this->Sku = $sku;
    $this->Name = $name;
    $this->Price = $price;
    $this->ProductType = $productType;
  }

  // RETURNING ERRORS 

  public function validateForm()
  {
    $this->validateSKU();
    $this->validateName();
    $this->validatePrice();
    $this->validateProductType();
    return $this->errors;
  }

  // VALIDATING SKU

  private function validateSKU()
  {
    $val = $this->Sku;
    if (empty($val)) {
      $this->addError('Sku', 'Please, Provide the SKU');
    } 
    }
  

  // VALIDATING NAME

  private function validateName()
  {
    $val = $this->Name;
    if (empty($val)) {
      $this->addError('Name', 'Please, Provide the NAME');
    } 
  }

  // VALIDATING PRICE

  private function validatePrice()
  {
    $val = $this->Price;

    if (empty($val)) {
      $this->addError('Price', 'Please, Provide the PRICE');
    } 
  }

  // VALIDATING PRODUCTYPE

  public function validateProductType()
  {
    $val = $this->ProductType;
    if (empty($val)) {
      $this->addError('ProductType', 'Please, Select the Type of Product');
    } 
  }

  // ADDING ERRORS

  private function addError($key, $val)
  {
    $this->errors[$key] = $val;
  }
}
