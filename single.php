<?php
require_once 'includes/filter-wrapper.php';

$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);

if(empty($id)){
	header('Location:index.php');
	exit;
}
require_once 'includes/db.php';

$sql = $db->prepare('
	SELECT id, name, address, rating, description
	FROM skateboardparks
	WHERE id = :id
');

$sql->bindValue(':id', $id, PDO::PARAM_INT);

$sql->execute();
$parks = $sql->fetch();

if(empty($parks)){
	header('Location:index.php');
	exit;
}

$title = $parks['name'];

include 'includes/theme-top.php';

?>

	<div>
		<h1><?php echo $parks['name'];?></h1>
		<p>Address: <?php echo $parks['address'];?></p>
		<meter value="<?php echo $parks['rating'];?>" min="0" max="5">Rating:<?php echo $parks['rating'];?></meter>
		<p>Description: <?php echo $parks['description'];?></p>
		<a href="index.php">Home</a>
	</div>
	<?php include 'includes/theme-bottom.php'?>