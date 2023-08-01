const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

var datas=[];
obj  =  ["fullname","username","email","password","comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(idx){
    for(let i=0;i<getpages.length-1 ;i++){
       getpages[idx].classList.remove('hidden');
       idx === getpages.length-1 ? nextbtn.textContent = "submit" : nextbtn.textContent = "Next";
    }
}


function gonow(one){

     if(one === 1 && !formvalid()) return false;
     getpages[curidx].classList.remove('hidden');

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

function* genfun() {
    var index = 0;
  
    while (index < obj.length) {
      yield index++;
    }
  }
  
  let gen = genfun();

function formvalid(){
    var valid = true;

    var getcurrinput = getpages[curidx].getElementsByTagName('input');
    // console.log(getcurrinput);
    // console.log(getcurrinput[0].value);
  
    for (var x = 0; x < getcurrinput.length; x++) {
      // console.log(getcurrinput[x].value);
      if (getcurrinput[x].value === '') {
        getcurrinput[x].classList.add('invalid');
        valid = false;
      } else {
        // console.log(objkey[x]);
        // console.log(getcurrinput[x].value);
        // console.log('gen value is = ', gen.next().value);
        // Method 1
        // const keys = objkeys[gen.next().value];
        // // console.log(key);
        // const values = getcurrinput[x].value;
  
        // const obj = {
        //   [keys]: values,
        // };
  
        // Method 2
        // const keys = objkeys[gen.next().value];
        // const values = getcurrinput[x].value;
        // var obj = {};
        // obj[keys] = values;
        // datas.push(obj);
  
        // Method 3
        const keys = obj[gen.next().value];
        const values = getcurrinput[x].value;
        datas.push({ [keys]: values });
      }
    }
 

    
}


