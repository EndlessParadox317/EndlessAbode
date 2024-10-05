

document.addEventListener('keydown',swap);


function swap(event){ // need to swap event cause it contains information about which key was pressed
    if (event.key === 'ArrowRight') {
        if (window.location.href.includes('signup.php')){ //if at sign up and pressed swap to login
        window.location.href = 'login.php';
        }
    } else if (event.key === 'ArrowLeft') {
        if (window.location.href.includes('login.php')){     //if at login and pressed swapped to sign up  the window.location.href returns something like http://example.com/signup.php 
                                                             //so we cant just use  window.location.href===login.php we need to see if its included
        window.location.href = 'signup.php';
        }
    }
}