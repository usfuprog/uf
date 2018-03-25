/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function starter(inp, out, algo)
{
//        alert(inp + out + algo);
        addDependency
        (
            $("[name = " + inp + "]").eq(0), $("[name = countWords]").eq(0), "choose randomly", "select manualy"
        );
        
        addDependency
        (
            $("[name = " + out + "]").eq(0), $("[name = nameFile]").eq(0), "text file", "html"
        );
        
};

function addDependency(elem1, elem2, str1, str2)
{
    $(elem1).change(function()
        {
            if($(this).children(":checked").val() === str1)
            {
                $(elem2).css("visibility", "visible");
            }
            else
            {
                $(elem2).css("visibility", "hidden");
            }
        });
        
        if ($(elem1).children(":checked").val() === str2)
            $(elem2).css("visibility", "hidden");
};

function addDependency2(str)
{
    alert(str);
};
