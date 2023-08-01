const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

var datas=[];
obj  =  ["fullname","username","email","password","comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(num) {
    for (let i = 0; i < getpages.length; i++) {
      if (i === num) {
        getpages[num].style.display = "block";
      } else {
        getpages[i].style.display = "none";
      }
    }
  
    nextbtn.textContent = num === getpages.length - 1 ? "Submit" : "Next";
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


