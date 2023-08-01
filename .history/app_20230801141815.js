const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

obj  =  ["fullname","username","email","password","comfirm"];


function showpage(){
    for(let i=0;i<getpages.length-1 ;i++){
        if (document.querySelector(`#${obj[i]}`).value = ""){
            
        }
    }
}