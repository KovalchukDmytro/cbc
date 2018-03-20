if(document.getElementById('send-mas'))
{

    document.getElementById('send-mas').addEventListener('submit', function(evt){

        var form_obj=document.getElementById('send-mas');
        var error_msg = "Please fill in all required fields";
        var is_error = false;
        for (var i = 0; form_obj_elem = form_obj.elements[i]; i++)
        {
            if (form_obj_elem.type=="file" || form_obj_elem.type=="text"){
                if (form_obj_elem.getAttribute("required") && !form_obj_elem.value){
                    is_error = true;
                }
            }
        }

        if (is_error)
        {
            alert(error_msg);
        }
        else
        {
            // var fin=true;
            var http = new XMLHttpRequest(), f = this;
            evt.preventDefault();
            console.log(f);
            http.open("POST", "/form/save/", true);
            http.onloadstart = function(){

            }

            http.onload = function(){
                $('#overlay').fadeIn(400, function(){
                    $('#modal_form')
                        .css('display', 'block')
                        .animate({opacity: 1, top: '50%'}, 200);
                });
            }

            http.onerror = function() {
                //fin=false;
                confirm('Sorry, the data was not transferred');
            }
            http.send(new FormData(f));
        }
    }, false);

}



