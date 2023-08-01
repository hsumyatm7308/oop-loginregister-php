const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

obj  =  ["fullname","username","email","password","comfirm"];


const curridx = 0;

showpage(curidx);

function showpage(idx){
    for(let i=0;i<getpages.length-1 ;i++){
       getpages[idx].classList.remove('hidden');
       idx === getpages.length-1 ? nextbtn.textContent = "submit" : nextbtn.textContent = "Next";
    }
}


function gonow(num) {
    // console.log(num);
    // console.log(curridx);
    // getpages[curridx].style.display = 'none';
    // curridx = curridx + num;
    // // console.log(curidx);
  
    // if (curridx >= getpages.length) {
    //   getform.submit();
    // }
    // showpage(curridx);
    // console.log(formvalidation());
  
    // if (num === 1 && formvalidation()) {
    //   getpages[curridx].style.display = 'none';
    //   curridx = curridx + num;
    //   // console.log(curidx);
    //   if (curridx >= getpages.length) {
    //     getform.submit();
    //   }
    //   showpage(curridx);
    // }
  
    // if (!formvalidation()) {
    //   return false;
    // }
  
    // if (num === 1 && !formvalidation()) {
    //   return false;
    // }
    // if (!formvalidation()) return false;
  
    if (num === 1 && !formvalidation()) return false;
  
    getpages[curridx].style.display = 'none';
    curridx = curridx + num;
    // console.log(curidx);
  
    if (curridx >= getpages.length) {
      // getform.submit();
      getform.style.display = 'none';
      getrstcontainer.style.display = 'block';
  
      result(datas);
  
      return false;
    }
    showpage(curridx);
  }
  
  function* genfun() {
    var index = 0;
  
    while (index < objkeys.length) {
      yield index++;
    }
  }
  
  let gen = genfun();
  
  // console.log(gen.next().value);
  // console.log(gen.next().value);
  
  function formvalidation() {
    var valid = true;
  
    var getcurrinput = getpages[curridx].getElementsByTagName('input');
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
        const keys = objkeys[gen.next().value];
        const values = getcurrinput[x].value;
        datas.push({ [keys]: values });
      }
    }
  
    if (valid) {
      getdots[curridx].className += ' done';
    }
  
    return valid;
  }