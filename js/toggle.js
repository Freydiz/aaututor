function showHide() {
    if(document.getElementById('chkbox').checked) {
       document.getElementById('hiddenField').style.display='block';
        document.getElementById('bio').required = true;
        document.getElementById('fee').required = true;
        document.getElementById('tags').required = true;
       } else {
           document.getElementById('hiddenField').style.display='none';
            document.getElementById('bio').required = false;
            document.getElementById('fee').required = false;
            document.getElementById('tags').required = false;
       }
}

function showHideEdit() {
    if(document.getElementById('editchkbox').checked) {
       document.getElementById('hiddenFieldEdit').style.display='block';
        document.getElementById('bio').required = true;
        document.getElementById('fee').required = true;
        document.getElementById('tags').required = true;
       } else {
           document.getElementById('hiddenFieldEdit').style.display='none';
            document.getElementById('bio').required = false;
            document.getElementById('fee').required = false;
            document.getElementById('tags').required = false;
       }
}