
function showHide(number) {
    var x = document.getElementById("detaille" + number);

    if( !x.cache) {
        x.style.display = "block";
        x.cache=true;
    } else{
            x.style.display = "none";
            x.cache=false;
        }
}
