
<tr>
  <th> nome </th>
  <th> email </th>
  <th> senha </th>
  <th> empresa </th>
</tr>

<?php include("conexao.php");

$sql_type = "SELECT * FROM informacoes";
$resul = $conexao->query($sql_type);

if ($resul->num_rows > 0){
    
    while($row = $resul->fetch_assoc()){

        echo '<tr>';
        echo '<td>'. $row['nome'].'</td>';
        echo '<td>'. $row['email'].'</td>';
        echo '<td>'. $row['senha'].'</td>';
        echo '<td>'. $row['empresa'].'</td>';
        echo '</tr>';
    }
}
?>