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
    var  fileInput1 = $("#archivo1").wrap(wrapper);
         // fileInput2 = $("#archivo2").wrap(wrapper),
         // fileInput3 = $("#archivo3").wrap(wrapper),
         // fileInput4 = $("#archivo4").wrap(wrapper),
         // fileInput5 = $("#archivo5").wrap(wrapper),
         // fileInput6 = $("#archivo6").wrap(wrapper),
         // fileInput7 = $("#archivo7").wrap(wrapper),
         // fileInput8 = $("#archivo8").wrap(wrapper),
         // fileInput9 = $("#archivo9").wrap(wrapper),
         // fileInput10 = $("#archivo10").wrap(wrapper);

    $("#photo-1").on("click",function () {
        fileInput1.click();
    }).show();
    // $("#photo-2").on("click",function () {
    //     fileInput2.click();
    // }).show();
    // $("#photo-3").on("click",function () {
    //     fileInput3.click();
    // }).show();
    // $("#photo-4").on("click",function () {
    //     fileInput4.click();
    // }).show();
    // $("#photo-5").on("click",function () {
    //     fileInput5.click();
    // }).show();
    // $("#photo-6").on("click",function () {
    //     fileInput6.click();
    // }).show();
    // $("#photo-7").on("click",function () {
    //     fileInput7.click();
    // }).show();
    // $("#photo-8").on("click",function () {
    //     fileInput8.click();
    // }).show();
    // $("#photo-9").on("click",function () {
    //     fileInput9.click();
    // }).show();
    // $("#photo-10").on("click",function () {
    //     fileInput10.click();
    // }).show();

    fileInput1.on("change",function () {
       var file = this.files[0],
           fileName = file.name,
           fileSize = file.size,
           fileType = file.type;

        if(fileType.match('image.*')){
            //Validamos el tipo de archivo
            //FileReader API HTML5
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#photo-1").html("");
                $("#cerrar-photo-1").html("");
                $("#photo-1").append("<img src='" + e.target.result + "' id='thumb-1' class='viewPhoto' alt='Error'/>");
                $("#cerrar-photo-1").show(function () {
                    $("#cerrar-photo-1").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                });

                // $("#photo-2").html("");
                // $("#cerrar-photo-2").html("");
                // $("#photo-2").append("<img src='" + e.target.result + "' id='thumb-2' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-2").show(function () {
                //     $("#cerrar-photo-2").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-3").html("");
                // $("#cerrar-photo-3").html("");
                // $("#photo-3").append("<img src='" + e.target.result + "' id='thumb-3' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-3").show(function () {
                //     $("#cerrar-photo-3").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-4").html("");
                // $("#cerrar-photo-4").html("");
                // $("#photo-4").append("<img src='" + e.target.result + "' id='thumb-4' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-4").show(function () {
                //     $("#cerrar-photo-4").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-5").html("");
                // $("#cerrar-photo-5").html("");
                // $("#photo-5").append("<img src='" + e.target.result + "'  id='thumb-5' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-5").show(function () {
                //     $("#cerrar-photo-5").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-6").html("");
                // $("#cerrar-photo-6").html("");
                // $("#photo-6").append("<img src='" + e.target.result + "'  id='thumb-6' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-6").show(function () {
                //     $("#cerrar-photo-6").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-7").html("");
                // $("#cerrar-photo-7").html("");
                // $("#photo-7").append("<img src='" + e.target.result + "' id='thumb-7' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-7").show(function () {
                //     $("#cerrar-photo-7").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-8").html("");
                // $("#cerrar-photo-8").html("");
                // $("#photo-8").append("<img src='" + e.target.result + "'  id='thumb-8' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-8").show(function () {
                //     $("#cerrar-photo-8").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-9").html("");
                // $("#cerrar-photo-9").html("");
                // $("#photo-9").append("<img src='" + e.target.result + "'  id='thumb-9' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-9").show(function () {
                //     $("#cerrar-photo-9").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });
                //
                // $("#photo-10").html("");
                // $("#cerrar-photo-10").html("");
                // $("#photo-10").append("<img src='" + e.target.result + "'  id='thumb-10' class='viewPhoto' alt='Error'/>");
                // $("#cerrar-photo-10").show(function () {
                //    $("#cerrar-photo-10").append("<img src='img/molumen_red_round_error_warning_icon.png' width='30px' alt='Error'/>");
                // });

                // alert("<img src='" + e.target.result + "' class='thumbnail'/>");
                // $("#mensaje").append("<img src='" + e.target.result + "'/>");
            };
            reader.readAsDataURL(file);
        }else{
            alert("Error solo se permiten Imagnes");
        }
    });

    $("#cerrar-photo-1").on("click",function () {
        $("#thumb-1,#cerrar-photo-1").hide();

        fileInput1.replaceWith(fileInput1 = fileInput1.val('').clone(true));
    });
    // $("#cerrar-photo-2").on("click",function () {
    //     $("#thumb-2,#cerrar-photo-2").hide();
    //
    //     fileInput2.replaceWith(fileInput2 = fileInput2.val('').clone(true));
    // });
    // $("#cerrar-photo-3").on("click",function () {
    //     $("#thumb-3,#cerrar-photo-3").hide();
    //
    //     fileInput3.replaceWith(fileInput3 = fileInput3.val('').clone(true));
    // });
    // $("#cerrar-photo-4").on("click",function () {
    //     $("#thumb-4,#cerrar-photo-4").hide();
    //
    //     fileInput4.replaceWith(fileInput4 = fileInput4.val('').clone(true));
    // });
    // $("#cerrar-photo-5").on("click",function () {
    //     $("#thumb-5,#cerrar-photo-5").hide();
    //
    //     fileInput5.replaceWith(fileInput5 = fileInput5.val('').clone(true));
    // });
    // $("#cerrar-photo-6").on("click",function () {
    //     $("#thumb-6,#cerrar-photo-6").hide();
    //
    //     fileInput6.replaceWith(fileInput6 = fileInput6.val('').clone(true));
    // });
    // $("#cerrar-photo-7").on("click",function () {
    //     $("#thumb-7,#cerrar-photo-7").hide();
    //
    //     fileInput7.replaceWith(fileInput7 = fileInput7.val('').clone(true));
    // });
    // $("#cerrar-photo-8").on("click",function () {
    //     $("#thumb-8,#cerrar-photo-8").hide();
    //
    //     fileInput8.replaceWith(fileInput8 = fileInput8.val('').clone(true));
    // });
    // $("#cerrar-photo-9").on("click",function () {
    //     $("#thumb-9,#cerrar-photo-9").hide();
    //
    //     fileInput9.replaceWith(fileInput9 = fileInput9.val('').clone(true));
    // });
    // $("#cerrar-photo-10").on("click",function () {
    //     $("#thumb-10,#cerrar-photo-10").hide();
    //
    //     fileInput10.replaceWith(fileInput10 = fileInput10.val('').clone(true));
    // });

    // JQUERY UPLOAD

    var bar     = $('.bar'),
        percent = $('.percent'),
        status  = $('.msj');
    $('#formularioPhoto').ajaxForm({
        beforeSend: function() {
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },complete: function(data) {
            // alert(data.responseText);
            if(data.responseText == 2){
                status.html("");
                status.append('<div class="alert alert-dismissible alert-danger"><p><strong>ERROR!</strong>Escoja por lo menos una imagen</p></div>');
            }else if(data.responseText == 3){
                status.html("");
                status.append('<div class="alert alert-dismissible alert-warning"><p><strong>ERROR!</strong>La carpeta no tiene Permisos</p></div>');
            }else if(data.responseText == 4){
                status.html("");
                status.append('<div class="alert alert-dismissible alert-info"><p>Extensiones permitidas JPG, GIF, PNG</p></div>');
            }else if(data.responseText == 5){
                status.html("");
                status.append('<div class="alert alert-dismissible alert-success"><strong>Carga completa!</strong></div>');
            }
        }
    });

    // FIN JQUERY UPLOAD
});