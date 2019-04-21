
//testing code
function Onclick()
{
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;

    createDB();
    alert(firstname +" "+ lastname);
}



function createDB()
{
    $.ajax({
        type: "POST",
        url: '/register.php',
        data:{action:'call_this'},
        success:function(html) {
          alert(html);
        }
   });
}
