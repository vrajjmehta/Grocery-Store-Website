function display_cart()
{
    var x = document.getElementById("list").rows.length;
    
    if(x>1)
    {
        $("body",parent.document).find('#left').hide();  
        $("body",parent.document).find('#right').hide();
    }
    else
    {
        alert('Product list is empty. Please add product for checkout.'); 
        $("body",parent.document).find('#bottom').show();
    }
    
}

function displayCart()
{
    $("body",parent.document).find('#bottom').show();
}

function clear()
{
    alert('Cart Empty. Please Select The Product Again');
}