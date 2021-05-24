<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["title"])) {
	$title = $_POST["title"];
	$description = $_POST["description"];


	
  $sql = "INSERT INTO posts (post_title,description) VALUES ('" . $title . "','" . $description . "')";
  $faq_id = $db_handle->executeInsert($sql);
	if(!empty($faq_id)) {
		$sql = "SELECT * from posts WHERE id = '$faq_id' ";
		$posts = $db_handle->runSelectQuery($sql);
	}
?>
<tr class="table-row" id="table-row-<?=$posts[0]["id"]; ?>">
<td contenteditable="true" onBlur="saveToDatabase(this,'post_title','<?=$posts[0]["id"]; ?>')" onClick="editRow(this);"><?=$posts[0]["post_title"]; ?></td>
<td contenteditable="true" onBlur="saveToDatabase(this,'description','<?=$posts[0]["id"];?>')" onClick="editRow(this);"><?=$posts[0]["description"]; ?></td>
<td><a class="ajax-action-links" onclick="deleteRecord(<?=$posts[0]["id"];?>);">Delete</a></td>
</tr>  
<?php } ?>