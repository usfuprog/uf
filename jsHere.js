/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function starter(inp, out, algo)
{

//        alert(inp + out + algo);
        $("[name = " + inp + "]").change(function()
        {
            if($(this).children(":checked").val() === "choose randomly")
            {
                $("[name = countWords]").css("visibility", "visible");
            }
            else
            {
                $("[name = countWords]").css("visibility", "hidden");
            }
        });
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

};
