/**********************************************************
* JavaScript/jQuery Week03: Shopping Cart
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
/**********************************************************
* Add Item
* Ajax request to Add to cart
**********************************************************/
function addToCart(itemId) {
  $.post("addToCart.php", {item:itemId},
  function(data, status){
    $('#message').html(data);
  });
}

/**********************************************************
* Delete Item
* Ajax request to delete item
**********************************************************/
function deleteItem(itemId) {
  $.post("delete.php", {item:itemId},
  function(){
    location.reload();
  });
}

/**********************************************************
* Checkout
* Ajax request for confirmation message
**********************************************************/
function checkout() 
{
  $.get("confirmation.php", function(data, status){
    if(status == "success")
    {
      $('#confirmation').html(data);
    }
  });
}