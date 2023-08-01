const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

obj  =  ["fullname","username","email","password","comfirm"];


const curidx = 0;

showpage(curidx);

function showpage(idx){
    for(let i=0;i<getpages.length-1 ;i++){
       getpages[idx].classList.remove('hidden');
       idx === getpages.length-1 ? nextbtn.textContent = "submit" : nextbtn.textContent = "Next";
    }
}


function gonow(one){
     getpages[curidx].classList.add('hidden');

     if(one === 1 && !formvalid()) return false;
     curidx = curidx + one;
     console.log(curidx);

     showpage(curidx);
}

function* yeildfun(){
      var index = 0;

      while(index < obj.length){
        yield function() {
            index++;
        }
      }
}

let yld = yeildfun();

function formvalid(){
    let flag = true;
}


