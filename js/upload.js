// $(function(){
//     $("input[name='file']").on("change", function(){
//         var formData = new FormData($("#formulario")[0]);
//         var ruta = "controllers/upload.php";
//         $.ajax({
//             url: ruta,
//             type: "POST",
//             data: formData,
//             contentType: false,
//             processData: false,
//             success: function(datos)
//             {
//                 $("#respuesta").html(datos);
//             }
//         });
//     });
// });

$(document).ready(function () {
    var wrapper = $("<div/>").css({height:0,width:0,'overflow': 'hidden'});
    var fileInput = $("#archivo1").wrap(wrapper);

    $("#BtnphotoUp").on("click",function () {
        fileInput.click();
    }).show();

    fileInput.on("change",function () {
       var file = this.files[0],
           fileName = file.name,
           fileSize = file.size,
           fileType = file.type;
        // alert(file + " " + fileName + " " + fileSize + " " + fileType);

        if(fileType.match('image.*')){
            //Validamos el tipo de archivo

            //FileReader API HTML5
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#BtnphotoUp").html("");
                $("#cerrar").html("");
                $("#BtnphotoUp").append("<img src='" + e.target.result + "' class='viewPhoto' alt='Error'/>");
                $("#cerrar").show(function () {
                   $("#cerrar").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                });
                // alert("<img src='" + e.target.result + "' class='thumbnail'/>");
                // $("#mensaje").append("<img src='" + e.target.result + "'/>");
            };
            reader.readAsDataURL(file);
        }else{
            alert("Error solo se permiten Imagnes");
        }
    });
    $("#cerrar").on("click",function () {
        $("#viewPhoto,#cerrar").hide();

        fileInput.replaceWith(fileInput = fileInput.val('').clone(true));
    });
});

function uploadMultipleFiles( files ){
    var limit = 1048576*2,//2MB
        xhr,
        mensaje = select('div#mensaje');

    if( files[0] != undefined ){

        if( !confirm('Subir '+files.length+' Foto?') )
            return false;

        mensaje.innerHTML = 'Empezando la carga...';

        for(var i=0;i<files.length;i++){
            var current_file = files[i];

            mensaje.innerHTML = 'Cargando foto '+(i+1)+'...';

            if( current_file.size < limit ){
                xhr = new XMLHttpRequest();

                xhr.upload.addEventListener('error',function(e){
                    alert('Ha habido un error cargando el archivo '+(i+1));
                    return false;
                }, false);

                xhr.open('POST','controllers/upload.php');

                xhr.setRequestHeader("Cache-Control", "no-cache");
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                xhr.setRequestHeader("X-File-Name", current_file.name);

                xhr.send(current_file);
            }else{
                alert('El archivo '+(i+1)+' es mayor de 2MB!');
                mensaje.innerHTML = 'El archivo '+(i+1)+' es mayor de 2MB!';
                return false;
            }
        }

        mensaje.innerHTML = '<div class="alert alert-dismissible alert-success"><h4>Carga completa! <img style="width: 20px;" src="http://4.bp.blogspot.com/-gBo2TwFFXh4/UD7x7NnhGoI/AAAAAAAAACc/Qd9m5T_40-Y/s1600/585px-Bueno-verde.png"></h4></div>';
    }
}

function select( str ){
    return document.querySelector(str);
}

var upload_button = select('#subir');

upload_button.onclick = function(e){
    e.preventDefault();
    this.disabled = 'true';
    var archivo1 = select('#archivo1').files[0],
        // archivo2 = select('#archivo2').files[0],
        // archivo3 = select('#archivo3').files[0],
        todos_los_archivos = [archivo1];

    uploadMultipleFiles(todos_los_archivos);
}