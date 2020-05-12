/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function display()
{
    var x = document.getElementById("list").rows.length;
    
    if(x>1)
    {
     $("body",parent.document).find('#left').hide();  
     $("body",parent.document).find('#right').hide();
    }
    else
    {
      alert('Product list is empty. Please add product for checkout..'); 
      $("body",parent.document).find('#bottom').hide();
    }
   
      
}


