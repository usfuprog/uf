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
            $("[name = " + inp + "]").eq(0), $("[name = countWords]").eq(0), "choose randomly"
        );
        
        addDependency
        (
            $("[name = " + out + "]").eq(0), $("[name = nameFile]").eq(0), "text file"
        );
        
        addDependency
        (
//            $("[name = " + "badTranslation" + "]").eq(0), $("[name = wordsListWrapper]").eq(0), "select manualy", false
        );
        
        addDependency
        (
            $("[name = " + inp + "]").eq(0), $("[name = wordsListWrapper]").eq(0), "select manualy"
        );
        
        addDependency
        (
            $("[name = " + inp + "]").eq(0), $("[name = choosedWords]").eq(0), "select manualy"
        );
        
        
        starterPart2();
};

function addDependency(elem1, elem2, str1, disappear)//Net Beans dont like this sintaxis: disappear = true
{
    if (disappear !== false)
        disappear = true;
    
    $(elem1).change(function()
        {
            if($(this).children(":checked").val() === str1)
            {
                $(elem2).css("visibility", "visible");
                checkAjax(elem2);
            }
            else
            {
                $(elem2).css("visibility", "hidden");
            }
        });
        
//        alert(str1);
        if (disappear)
            if ($(elem1).children(":checked").val() !== str1)
                $(elem2).css("visibility", "hidden");
};

function starterPart2()
{
    checkAjax($("[name = wordsListWrapper]").eq(0));
    
    $("[name = " + "wordsListWrapper" + "]").on("click", 
    function(event)
    {
        var jqObj = $(event.target);
        var name = jqObj.val();
        name = name.substr(0, name.search(" - "));
        var translate = jqObj.val();
        translate = translate.substring(translate.search(" - ") + 3, translate.length);
        name = name.replace('\'', '&#039;');
        translate = translate.replace('\'', '&#039;');
//        alert(translate);
        $("[name = choosedWords").append
        ("<div><button type='button'>X</button> " + jqObj.val() + "</div>").append
        ("<input type='hidden' name='wrd" + name + "' value='" + translate + "' />");
        event.stopPropagation();
    }
    );
    
    $("[name = choosedWords").on("click", 
    function(event)
    {
        $(event.target).parent().children("button").empty();
        var name = $(event.target).parent().text().trim();
        name = name.substr(0, name.search(" - "));
//        alert(name + name.length);
        $(event.target).closest("div").parent().children("[name=wrd" + name + "]").remove();
        $(event.target).closest("div").remove();
    }
    );
};


function checkAjax(elem)
{
    if (elem.attr("name") !== "wordsListWrapper" || elem.css("visibility") === "hidden")return;
    if (elem.children().children().length > 0)return;
//    alert(elem.children().children().length);
    var appTo = elem.children("select").filter("[name=wordsList]");
    if (appTo.length != 1)return;
    
    $.post("db4ever/ajaxReq.php", {}, function(data)
    {
        var tmp;
        
        for (tmp in data)
        {
            $("<option id=" + (tmp * 1 + 1) + ">" + data[tmp] + "</option>").appendTo(appTo);
        }
    }, "json");
    
}


$( document ).ready(function() {

//    console.log( window.history );
//    var startHistoryCount = window.history.length;
//    console.log( startHistoryCount );
    
//    $( "#to_main" ).on( "click", function() {
//    console.log( startHistoryCount );
//    window.history.go( -1 );
//    });
////    window.history.go( -1 );
    $( "#to_main" ).on( "click", function() {
    //alert($("#to_main").data("hidden"));
    window.location=$("#to_main").data("hidden");
    });
});
