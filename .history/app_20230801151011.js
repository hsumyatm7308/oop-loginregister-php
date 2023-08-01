const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

var datas=[];
obj  =  ["fullname","username","email","password","comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(idx){
    for(let i=0;i<getpages.length-1 ;i++){
       getpages[idx].style.display = "block";
       idx === getpages.length-1 ? nextbtn.textContent = "submit" : nextbtn.textContent = "Next";
    }
}


function gonow(one){
  
   
    getpages[curidx].style.display = "none";
    curidx = curidx + one;
    console.log(curidx);
     if(one === 1 && !formvalid()) return false;
    
    


     if (curidx >= getpages.length) {
        // getform.submit();
        getform.style.display = 'none';
    
        result(datas);
    
        return false;
      }

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

let gen = yeildfun();

function formvalid(curridx){
    var valid = true;

 

    
}


