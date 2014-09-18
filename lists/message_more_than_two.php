<?php
$locale = "en-US";

$elements5 = array("uno","dos","tres","cuatro","cinco");
$elements3 = array("uno","dos","tres");
$elements2 = array("uno","dos");
$elements1 = array("uno");

echo "List to format:<br>\n";
echo "<pre>";
print_r($elements);

$prb = $getResournceBundle($locale) // Pseudo code to show outside.

$formats = array(
   "LIST_TWO_ITEMS" => $prb->get_string("LIST_TWO_ITEMS"),
   "LIST_MORE_THAN_TWO_ITEMS" =>$prb->get_string("LIST_MORE_THAN_TWO_ITEMS"),
   );


function msgfm_format_message_lists($locale,$formats,$elements){
   $size = count($elements);
   if ($size == 1 ){
      $result = $elements[0];
   }
   if ($size == 2){
      $result = message_list($locale,$formats["LIST_TWO_ITEMS"],array($elements[0],$elements[1]));
   }
   if ($size > 2 ){
      $size_rest = $size - 2;
      $end_array = array($elements[0],$elements[1],$size_rest);
      $result = message_list($locale,$formats["LIST_MORE_THAN_TWO_ITEMS"],$end_array);
}
return $result;
}

function message_list($locale,$format,$elements){
 $result = msgfmt_format_message($locale,$format,$elements);
 return $result;
}


$result = msgfm_format_message_lists($locale,$formats,$elements5);
echo "Result: ".$result;
echo "<br>\n";

$result = msgfm_format_message_lists($locale,$formats,$elements3);
echo "Result: ".$result;

echo "<br>\n";

$result = msgfm_format_message_lists($locale,$formats,$elements2);
echo "Result: ".$result;
echo "<br>\n";


$result = msgfm_format_message_lists($locale,$formats,$elements1);
echo "Result: ".$result;
echo "<br>\n";




?>
