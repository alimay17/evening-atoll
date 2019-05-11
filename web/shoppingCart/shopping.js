/**********************************************************
* JavaScript/jQuery Week03: Shopping Cart
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
function addToCart(itemId) {
  $.post("addToCart.php", {item:itemId},
  function(data, status){
    $('#message').html(data);
  });
}

/**********************************************************
* Checkout
* 
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


/**********************************************************
* Delete Item
* 
**********************************************************/

function deleteItem(itemId) {
  $.post("delete.php", {item:itemId},
  function(data, status){
    $('#message').html(data);
  });
}