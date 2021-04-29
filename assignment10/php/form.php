<?php

//WRITE YOUR CODE HERE
require_once("classes/StickyForm.php");

$stickyForm = new StickyForm();

function init(){
    global $elementsArr, $stickyForm;

    if(isset($_POST['submit']))
    {
        $postArr = $stickyForm->validateForm($_POST, $elementsArr);

        if($postArr['masterStatus']['status'] == "noerrors")
        {
            return addData();
        }
        else
        {
            return getForm("",$postArr);
        }
    }
    else
    {
        return getForm("", $elementsArr);
    }
}

$elementsArr = [
    "masterStatus"=>[
      "status"=>"noerrors",
      "type"=>"masterStatus"
    ],
      "name"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Name cannot be blank and must be a standard name</span>",
      "errorOutput"=>"",
      "type"=>"text",
      "value"=>"Scott",
          "regex"=>"name"
      ],
      "phone"=>[
          "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Phone cannot be blank and must be a valid phone number</span>",
      "errorOutput"=>"",
      "type"=>"text",
          "value"=>"999.999.9999",
          "regex"=>"phone"
    ],
    "address"=>[
        "errorMessage"=>"<span style='color: red; margin-left: 15px;'>Address cannot be blank and must be a valid address</span>",
    "errorOutput"=>"",
    "type"=>"text",
        "value"=>"123 Somewhere",
        "regex"=>"address"
  ],
    "state"=>[
      "type"=>"select",
      "options"=>["mi"=>"Michigan","oh"=>"Ohio","pa"=>"Pennslyvania","tx"=>"Texas"],
          "selected"=>"oh",
          "regex"=>"name"
      ],
    "financial"=>[
      "errorMessage"=>"<span style='color: red; margin-left: 15px;'>You must select at least one financial option</span>",
      "errorOutput"=>"",
      "type"=>"checkbox",
      "action"=>"required",
      "status"=>["cash"=>"", "check"=>"", "credit"=>""]
    ],
    "eyeColor"=>[
      "action"=>"notRequired",
      "type"=>"radio",
      "value"=>["blue"=>"", "brown"=>"", "hazel"=>"", "green"=>"", "other"=>""]
    ]
  ];
  
  
function addData()
{
    global $elementsArr;  
    return getForm("Contact Information Added", $elementsArr);
}

function getForm($acknowledgement, $elementsArr)
{
    global $stickyForm;
$options = $stickyForm->createOptions($elementsArr['state']);

/* THIS IS A HEREDOC STRING WHICH CREATES THE FORM AND ADD THE APPROPRIATE VALUES AND ERROR MESSAGES */
$form = <<<HTML
    <form method="post" action="index.php?page=form">
    <div class="form-group">
      <label for="name">Name (letters only){$elementsArr['name']['errorOutput']}</label>
      <input type="text" class="form-control" id="name" name="name" value="{$elementsArr['name']['value']}" >
    </div>
    <div class="form-group">
      <label for="address">Address (just numbers and street) {$elementsArr['address']['errorOutput']}</label>
      <input type="text" class="form-control" id="address" name="address" value="{$elementsArr['address']['value']}" >
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <select class="form-control" id="state" name="state">
        $options
      </select>
    </div>
    <div class="form-group">
      <label for="phone">Phone (format 999.999.9999) {$elementsArr['phone']['errorOutput']}</label>
      <input type="text" class="form-control" id="phone" name="phone" value="{$elementsArr['phone']['value']}" >
    </div>
    <p>Please check all financial options (you must check at least one):{$elementsArr['financial']['errorOutput']}</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="financial[]" id="financial1" value="cash" {$elementsArr['financial']['status']['cash']}>
      <label class="form-check-label" for="financial1">Cash</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="financial[]" id="financial2" value="check" {$elementsArr['financial']['status']['check']}>
      <label class="form-check-label" for="financial2">Check</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="financial[]" id="financia3" value="credit" {$elementsArr['financial']['status']['credit']}>
      <label class="form-check-label" for="financial3">Credit</label>
    </div>
        
    <p>Please select an eye color (optional):</p>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="eyeColor" id="eyeColor1" value="blue"  {$elementsArr['eyeColor']['value']['blue']}>
      <label class="form-check-label" for="eyeColor1">Blue</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="eyeColor" id="eyeColor2" value="brown"  {$elementsArr['eyeColor']['value']['brown']}>
      <label class="form-check-label" for="eyeColor2">Brown</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="eyeColor" id="eyeColor3" value="hazel"  {$elementsArr['eyeColor']['value']['hazel']}>
      <label class="form-check-label" for="eyeColor3">Hazel</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="eyeColor" id="eyeColor4" value="green"  {$elementsArr['eyeColor']['value']['green']}>
      <label class="form-check-label" for="eyeColor4">Green</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="eyeColor" id="eyeColor5" value="other"  {$elementsArr['eyeColor']['value']['other']}>
      <label class="form-check-label" for="eyeColor5">Other</label>
    </div>
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
HTML;

return [$acknowledgement, $form];

}

?>