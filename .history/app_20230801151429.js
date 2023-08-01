const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

var datas=[];
obj  =  ["fullname","username","email","password","comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(num) {
     
      getpages[num].style.display = "block";

  
  num === getpages.length - 1
    ? (getnextbtn.textContent = 'Submit')
    : (getnextbtn.textContent = 'Next');
  }
  


function gonow(one){
  
   
   
     if(one === 1 && !formvalid()) return false;
    
     getpages[curidx].style.display = "none";
    curidx = curidx + one;
    console.log(curidx);


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


