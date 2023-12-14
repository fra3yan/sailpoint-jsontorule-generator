<?php
$json_file = file_get_contents('C:\temp\Get_division-1702540999546.json');  // where you put json file
$json_data = json_decode($json_file);
$error = json_last_error();

//if you cannot read json file or error file
//var_dump($json_data, $error === JSON_ERROR_UTF8);





//config
$namefile = "role.java"; //generated file name


//header download
header("Content-Disposition: attachment; filename=\"" . $namefile . "\"");
header("Content-Type: application/force-download");
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header("Content-Type: text/plain");




$getAttribute = 'division_name';
echo '
import sailpoint.object.Identity;
import sailpoint.object.Link;
import sailpoint.object.Application;

String val = "";
String getAttribute = identity.getAttribute("'.$getAttribute.'");
if (getAttribute!=null) {
    switch (getAttribute) {

';


// example file location in $.data then use $json_data->data
// set case where the data then set val for return data
foreach ($json_data->data as $key => $value) {

echo '
    case "'.$value->division_name.'":
    val = "'.$value->division_id.'";
    return val;
    break;
';

}


echo '
    }
}
return val;';


