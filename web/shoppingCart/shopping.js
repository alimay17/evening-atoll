/**********************************************************
* JavaScript/jQuery Week03: Shopping Cart
* Alice Smith
* CS313 - Bro. Porter
**********************************************************/
/**********************************************************
* Checkout
* 
**********************************************************/
function checkout() 
{
  $.get("confirmation.php", function(data, status){
    if(status == "success")
    {
      $('#cart').html(data);
    }
    // file process error
    else
    {
      $('#cart').html("Unable to checkout at this time");
    }
  });
}
/**********************************************************
* display data
* displays data from server file
**********************************************************/
function displayData()
{
  // get file
  $.get("items.json", function(data, status){
  if(status == "success")
  {
    // create table and headers
    var keys, values;
    var table, tr, th, tabCell;
    keys = getKeys();
    table = document.createElement("table");
    tr = table.insertRow(-1);
  
    for(var i = 0; i < keys.length; i++)
    {
      th = document.createElement("th");
      th.className = "tHeader";
      th.innerHTML = keys[i];
      tr.appendChild(th);
    }
  
    // fill table
    for(var i = 0; i < data.length; i++)
    {
      tr = table.insertRow(-1); 
      values = getValues(data[i]);

      // from JSON file
      for(var j = 0; j < values.length; j++)
      {
        tabCell = tr.insertCell(-1);     
        tabCell.innerHTML = values[j];
      }
      //  Cart button
      tabCell = tr.insertCell(-1);
      tabCell.innerHTML = "<button class='add'>Add Bus</button>";
    }

    // display on page
    $("#dataTable").html("");
    $("#dataTable").append(table);
  }

  // file process error
  else
  {
    $('#dataTable').html("Unable to access file");
  }
}); 
}

/**********************************************************
* getKeys
* returns an array of data keys for display table headers
**********************************************************/
function getKeys()
{
  var keys = [
    "Picture",
    "Bus Manufacturer",
    "Make & Model",
    "Manufacture Date",
    "Selling Company",
    "Location",
    "Mileage",
    "General Information",
    "Price",
    "Add to Cart"
  ];
  return keys;
}

/**********************************************************
* getValues
* returns an array of values for display table
**********************************************************/
function getValues(json){
  var values = [];
  var keys = Object.keys(json);
  keys.forEach(function(key){
    values.push(json[key]);
  });
  return values;
}