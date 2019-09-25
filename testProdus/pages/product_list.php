<?
if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete'){
    if(mysqli_query($connection, "DELETE FROM produse WHERE id_p = {$_GET['id']}" )) {
        echo 'Succes';
    } else {
        echo 'Eroare';
    }
}

$result = mysqli_query($connection, "SELECT * FROM produse inner join categorie on produse.id_c = categorie.id_c");
?>
<table border="1">
    <tr>
        <td>Denumire</td>
        <td>Pret</td>
        <td>Categorie</td>
        <td>Adauga/modifica</td>
    </tr>
<? while($produse = mysqli_fetch_assoc($result)){?>
<tr>
	<td><?= $produse['Name']?></td>
	<td><?= $produse['Price']?></td>
    <td><?= $produse['Category']?></td>
	<td align="center">
        <a href="?page=product_list&action=delete&id=<?= $produse['id_p']?>" onclick="return confirm('Doriti sa stergeti inregistrarea?')">x</a>
    <a href="?page=product_edit&id=<?= $produse['id_p']?>">m</a>
  </td>
</tr>
<? }?>
