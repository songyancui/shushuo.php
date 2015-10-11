<?php
namespace Shushuo;

include("../vendor/autoload.php");
include("../src/Client.php");
include("../src/Req.php");

$project_id = "9845fa01a1";
$project_key = "75f90c1a7e497216100914f693df5e314d628c90";

$client = new Client($project_id, $project_key);
$arrContent = array(
                "customer"=> array(
                                "firstName"=>"Tome",
                                "lastName"=>"Smith"
                             ),
                "id" => "1849506679",
                "product" => "12 red roses",
                "purchasePrice" => 34.95
              );

$collection = "comsume";
$strContent = json_encode($arrContent);

$result = $client->writeEvent($collection, $strContent);



$arrContentBatch = array(
    "purchases" => array(
                        array(
                            "customer"=> array(
                                            "firstName"=>"Tome",
                                            "lastName"=>"Smith"
                                            ),
                            "id" => "1849506679",
                            "product" => "12 red roses",
                            "purchasePrice" => 34.95
                        ),
                        array(
                            "customer"=> array(
                                            "firstName"=>"Jane",
                                            "lastName"=>"Doe"
                                            ),
                            "id" => "123456",
                            "product" => "1 daisy",
                            "purchasePrice" =>  8.95 
                        
                        )
                   ),
    "refunds" => array(
                        array(
                            "customer"=> array(
                                            "firstName"=>"Tome",
                                            "lastName"=>"Smith"
                                            ),
                            "id" => "REF-1234",
                            "product" => "12 red roses",
                            "purchasePrice" => -34.95
                        )
                )
            );

$strContentBatch = json_encode($arrContentBatch);
$result = $client->writeEventBatch($strContentBatch);
var_dump($result);

?>
