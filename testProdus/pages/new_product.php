<?
if(!empty($_POST['name']) && !empty($_POST['price'])) {
	

	$result = mysqli_query($connection, "SELECT * FROM produse");

	if(mysqli_query($connection, "INSERT INTO produse SET name = '{$_POST['Name']}', price = {$_POST['Price']}, category = {$_POST['Category']}")) {
		echo 'Succes';
	} else {
		echo 'Eroare';
	}
} else {
?>
<form action="" method="post">
	Name <input type="text" name="name" >
	<br>
	Price <input type="number" name="price">
	<br>
	<? $resultCategory =  mysqli_query($connection, "SELECT * FROM categorie");?>
	Category
	<select name="category">
	<? while($categorie = mysqli_fetch_assoc($resultCategory)){?>
		<option value="<?=$categorie['id_c'];?>"><?=$categorie['Category'];?></option>
		<? }?>
	</select>
	<br>
	<input type="submit">
</form>

<?}?>