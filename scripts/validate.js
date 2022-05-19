function validateComment(){
    const comm = document.querySelector('.message_input').value.trim();
    const err = document.querySelector('.error');

    if (comm.length === 0){
        err.style.display = "block";
        return false;
    }
    else{
        err.style.display = "none";
    }
}


function validateSubs(){
    const username = document.querySelector('.username_input').value.trim();
    const email = document.querySelector('.email_input').value.trim();
    const err_user = document.querySelector('.error_user');
    const err_email = document.querySelector('.error_email');

    if (username.length !== 0){
        err_user.style.display = "none";
    }
    else{
        err_user.style.display = "block";
        return false;
    }
    if (email.length !== 0){
        err_email.style.display = "none";
    }
    else{
        err_email.style.display = "block";
        return false;
    }
}

function validateContact(){
    const fName = document.querySelector('.fName').value.trim();
        const sName = document.querySelector('.sName').value.trim();
    const phone = document.querySelector('.phone').value.trim();
    const email = document.querySelector('.email').value.trim();
    const message = document.querySelector('.message_input').value.trim();
    const error_fName = document.querySelector('.error_fName');
    const error_sName = document.querySelector('.error_sName');
    const error_phone = document.querySelector('.error_phone');
    const error_email = document.querySelector('.error_email');
    const error_message = document.querySelector('.error_message');

    if (fName.length !== 0){
        error_fName.style.display = "none";
    }
    else{
        error_fName.style.display = "block";
        return false;
    }
    if (sName.length !== 0){
        error_sName.style.display = "none";
    }
    else{
        error_sName.style.display = "block";
        return false;
    }
    if (phone.length !== 0){
        error_phone.style.display = "none";
    }
    else{
        error_phone.style.display = "block";
        return false;
    }
    if (email.length !== 0){
        error_email.style.display = "none";
    }
    else{
        error_email.style.display = "block";
        return false;
    }
    if (message.length !== 0){
        error_message.style.display = "none";
    }
    else{
        error_message.style.display = "block";
        return false;
    }
}