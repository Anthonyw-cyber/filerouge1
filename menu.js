function toggle()
{

        var x = document.getElementById("izi");

        if( !x.cache) {
            x.style.display = "block";
            x.cache=true;
        } else{
            x.style.display = "none";
            x.cache=false;
        }
}
