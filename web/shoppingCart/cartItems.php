<?php
session_start();

$items = array (
  '1' => array (
          'name' => '2000 Transit Blue Bird',
          'mileage' => '888323',
          'price' => 70000
  ),
  '2' => array (
          'name' => '1994 Standard Thomas Built',
          'mileage' => '1002223',
          'price' => 12000
  ),
  '3' => array (
          'name' => '2012 Standard Blue Bird, Propane',
          'mileage' => '78332',
          'price' => 100000
  ) 
);

// Set a default total
$total = 0;

if($_SESSION['cart']){

foreach ( $_SESSION['cart'] as $num ) {
    ?>
<tr>
    <td>
        Item: <?php echo $items[$num]['name']; ?>
    </td>
    <td>
        Price: <?php echo '$' . number_format($items[$num]['price']);?>
    </td>
    <!--<td>
        <button name='delete' onclick='deleteItem(<?php echo $num; ?>)'
        value='<?php echo $num; ?>'>Remove</button><br/>
    </td> -->
</tr>
<?php
    $total += $items[$num]['price'];
} // end foreach

}
else echo "<p>No items in cart</p>";
?>

Total: $<?php echo number_format($total); ?>