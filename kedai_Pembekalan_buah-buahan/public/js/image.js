function triggerClick() {
    document.querySelector('#product-image').click();
}

function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();
        if(reader == null){

        }
        reader.onload = function(e) {
            document.querySelector('#profileDisplay').style.display = "block";
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);

        }
        reader.readAsDataURL(e.files[0]);
    }
}
