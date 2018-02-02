$(document).ready( function() {
    
var cart = new shopping_cart("jadrn068");

    function updateDisplay() {
        var cartArray = cart.getCartArray();
        var toWrite = "<table>";
        toWrite += "<tr><th>SKU</th><th>Quantity</th></tr>";
        for(i=0; i < cartArray.length; i++) {
            toWrite += "<tr>";
            toWrite += "<td>"+cartArray[i][0]+"</td>";
            toWrite += "<td>"+cartArray[i][1]+"</td>"; 
            toWrite += "</tr>";
            }
        toWrite += "</table>"; 
        $('#cart').html(toWrite); 
        $('#count').text(cart.size());     
        }                 
    });