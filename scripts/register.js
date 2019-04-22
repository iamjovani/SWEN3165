
function createDB()
{
    $.ajax({
        type: "POST",
        url: 'register.php',
        data:{action:'call_this'},
        success:function(html) {
          alert(html);
        }
   });

   alert("Done!")
}
