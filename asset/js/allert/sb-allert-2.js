//=================================================
// auto close allert smooth
// dibuat : 11-01-2023
// oleh : mohammad taufan pramono
// site : https://mastau.fun
// ================================================


// eksekusi transisi hilang allert
window.setTimeout(function() {
    $(".alert2").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 7000);


