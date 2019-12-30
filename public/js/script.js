
if (window.location.pathname == '/Bilietai2/public/home') {
    var expandedForm = document.getElementsByClassName('expanded-form-insert')[0];
    var close = document.getElementsByClassName('expanded-close')[0];
    var btnSearch = document.getElementById('search-button');
    var dep = document.getElementById('search-select-dep');
    var arr = document.getElementById('search-select-arr');
    var depText = document.getElementById('departure-name');
    var arrText = document.getElementById('arrival-name');
    var depErr = document.getElementById('input-error-dep');
    var arrErr = document.getElementById('input-error-arr');
    var depValue = document.getElementById('departure-value');
    var arrValue = document.getElementById('arrival-value');

    btnSearch.onclick = function() {
        if(dep.value != '' && arr.value != ''){
            expandedForm.style.display = 'block';
            depText.innerHTML = 'Išvykimo oro uostas: ' + dep.value;
            arrText.innerHTML = 'Atvykimo oro uostas: ' + arr.value;
            depValue.value = dep.value;
            arrValue.value = arr.value;
        } else if(dep.value == '' && arr.value == '') {
            depErr.style.display = 'flex';
            arrErr.style.display = 'flex';
        } else if (dep.value == ''){
            depErr.style.display = 'flex';
        } else if (arr.value == ''){
            arrErr.style.display = 'flex';
        }
    }

    close.onclick = function() {
        expandedForm.style.display = 'none';
    }

    window.onclick = function(event) {
        if(event.target == expandedForm){
            expandedForm.style.display = 'none';
        }
    }

    dep.onclick = function(){
        depErr.style.display = 'none';
    }

    arr.onclick = function(){
        arrErr.style.display = 'none';
    }
}
if (window.location.pathname == '/Bilietai2/public/login') {
    var btnLogin = document.getElementById('login-button');
    var username = document.getElementById('login-username');
    var password = document.getElementById('login-password');
    var usrnErr = document.getElementById('input-error-usrn');
    var passErr = document.getElementById('input-error-pass');

    btnLogin.onclick = function() {
        if(username.value == '' && password.value == ''){
            usrnErr.style.display = 'flex';
            passErr.style.display = 'flex';
        } else if (username.value == '' && password.value != '') {
            usrnErr.style.display = 'flex';
        } else if (password.value == '' && username.value != '') {
            passErr.style.display = 'flex';
        }

        username.onclick = function(){
            usrnErr.style.display = 'none';
        }

        password.onclick = function(){
            passErr.style.display = 'none';
        }
    }
}

if (window.location.pathname == '/Bilietai2/public/admin/dashboard') {
    var expandedFormInsert = document.getElementsByClassName('expanded-form-insert')[0];
    var expandedFormUpdate = document.getElementsByClassName('expanded-form-update')[0];
    var close = document.getElementsByClassName('expanded-close')[0];
    var btnAdd = document.getElementsByClassName('add-button')[0];
    var btnUpdate = document.getElementsByClassName('update-button');
    var btnChange = document.getElementsByClassName('change-button')[0];
    var btnDelete = document.getElementsByClassName('delete-button')[0];
    var deleteBtn = document.getElementsByClassName('actual-delete-button');
    
    var header = document.getElementById('update-hrow');
      

    btnAdd.onclick = function() {
        expandedFormInsert.style.display = 'block';
    }

    

    close.onclick = function() {
        expandedFormInsert.style.display = 'none';
    }

    window.onclick = function(event) {
        if(event.target == expandedFormInsert){
            expandedFormInsert.style.display = 'none';
        }
    }

    btnDelete.onclick = function(){
        header.innerHTML = 'Trinti?';
        btnDelete.style.display = 'none';
        btnChange.style.display = 'inline-block';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'none';
            deleteBtn[i].style.display = 'inline-block';
        }
    }

    btnChange.onclick = function(){
        header.innerHTML = 'Keisti?';
        btnDelete.style.display = 'inline-block';
        btnChange.style.display = 'none';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'inline-block';
            deleteBtn[i].style.display = 'none';
        }
    }
}

if (window.location.pathname == '/Bilietai2/public/admin/planes') {
    var expandedFormInsert = document.getElementsByClassName('expanded-form-insert')[0];
    var expandedFormUpdate = document.getElementsByClassName('expanded-form-update')[0];
    var close = document.getElementsByClassName('expanded-close')[0];
    var btnAdd = document.getElementsByClassName('add-button')[0];
    var btnUpdate = document.getElementsByClassName('update-button');
    var btnChange = document.getElementsByClassName('change-button')[0];
    var btnDelete = document.getElementsByClassName('delete-button')[0];
    var deleteBtn = document.getElementsByClassName('actual-delete-button');
    
    var header = document.getElementById('update-hrow');
      

    btnAdd.onclick = function() {
        expandedFormInsert.style.display = 'block';
    }

    

    close.onclick = function() {
        expandedFormInsert.style.display = 'none';
    }

    window.onclick = function(event) {
        if(event.target == expandedFormInsert){
            expandedFormInsert.style.display = 'none';
        }
    }

    btnDelete.onclick = function(){
        header.innerHTML = 'Trinti?';
        btnDelete.style.display = 'none';
        btnChange.style.display = 'inline-block';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'none';
            deleteBtn[i].style.display = 'inline-block';
        }
    }

    btnChange.onclick = function(){
        header.innerHTML = 'Keisti?';
        btnDelete.style.display = 'inline-block';
        btnChange.style.display = 'none';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'inline-block';
            deleteBtn[i].style.display = 'none';
        }
    }

    
}

if (window.location.pathname == '/Bilietai2/public/admin/airports') {
    var expandedFormInsert = document.getElementsByClassName('expanded-form-insert')[0];
    var expandedFormUpdate = document.getElementsByClassName('expanded-form-update')[0];
    var close = document.getElementsByClassName('expanded-close')[0];
    var btnAdd = document.getElementsByClassName('add-button')[0];
    var btnUpdate = document.getElementsByClassName('update-button');
    var btnChange = document.getElementsByClassName('change-button')[0];
    var btnDelete = document.getElementsByClassName('delete-button')[0];
    var deleteBtn = document.getElementsByClassName('actual-delete-button');
    
    var header = document.getElementById('update-hrow');
      

    btnAdd.onclick = function() {
        expandedFormInsert.style.display = 'block';
    }

    

    close.onclick = function() {
        expandedFormInsert.style.display = 'none';
    }

    window.onclick = function(event) {
        if(event.target == expandedFormInsert){
            expandedFormInsert.style.display = 'none';
        }
    }

    btnDelete.onclick = function(){
        header.innerHTML = 'Trinti?';
        btnDelete.style.display = 'none';
        btnChange.style.display = 'inline-block';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'none';
            deleteBtn[i].style.display = 'inline-block';
        }
    }

    btnChange.onclick = function(){
        header.innerHTML = 'Keisti?';
        btnDelete.style.display = 'inline-block';
        btnChange.style.display = 'none';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'inline-block';
            deleteBtn[i].style.display = 'none';
        }
    }

    
}

if (window.location.pathname == '/Bilietai2/public/admin/tickets') {
    var expandedFormInsert = document.getElementsByClassName('expanded-form-insert')[0];
    var expandedFormUpdate = document.getElementsByClassName('expanded-form-update')[0];
    var close = document.getElementsByClassName('expanded-close')[0];
    var btnAdd = document.getElementsByClassName('add-button')[0];
    var btnUpdate = document.getElementsByClassName('update-button');
    var btnChange = document.getElementsByClassName('change-button')[0];
    var btnDelete = document.getElementsByClassName('delete-button')[0];
    var deleteBtn = document.getElementsByClassName('actual-delete-button');
    
    var header = document.getElementById('update-hrow');
      

    btnAdd.onclick = function() {
        expandedFormInsert.style.display = 'block';
    }

    

    close.onclick = function() {
        expandedFormInsert.style.display = 'none';
    }

    window.onclick = function(event) {
        if(event.target == expandedFormInsert){
            expandedFormInsert.style.display = 'none';
        }
    }

    btnDelete.onclick = function(){
        header.innerHTML = 'Trinti?';
        btnDelete.style.display = 'none';
        btnChange.style.display = 'inline-block';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'none';
            deleteBtn[i].style.display = 'inline-block';
        }
    }

    btnChange.onclick = function(){
        header.innerHTML = 'Keisti?';
        btnDelete.style.display = 'inline-block';
        btnChange.style.display = 'none';
        for(var i = 0; btnUpdate.length; i++){
            btnUpdate[i].style.display = 'inline-block';
            deleteBtn[i].style.display = 'none';
        }
    }

    
}