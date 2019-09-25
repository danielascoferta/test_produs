<?
$result = mysqli_query($connection, "SELECT * FROM produse WHERE id_p = {$_GET['id']}");
$product = mysqli_fetch_assoc($result);

if(!empty($_POST['name'])) {
	$result = mysqli_query($connection, "SELECT * FROM produse");

	if(mysqli_query($connection, "UPDATE produse SET name = '{$_POST['name']}', price = {$_POST['price']}, category = {$_POST['category']} WHERE id_p = {$_GET['id']}")) {
		echo 'Succes';
	} else {
		echo 'Eroare';
	}
} else {
?>
<form action="" method="post">
	Name <input type="text" name="name" value="<?= $product['Name']?>">
	<br>
	Price <input type="number" name="price" value="<?= $product['Price']?>">
	<br>
	<? $resultCategory =  mysqli_query($connection, "SELECT * FROM categorie");?>
	Category
	<select name="category">
		<? while($categorie = mysqli_fetch_assoc($resultCategory)){?>
			<option value="<?=$categorie['id_c'];?>" <?= $categorie['id_c'] == $product['id_p']?'selected':'';?>><?=$categorie['Category'];?></option>
			<? }?>
	</select>
	<br>
	<input type="submit">
</form>

<?}?>
