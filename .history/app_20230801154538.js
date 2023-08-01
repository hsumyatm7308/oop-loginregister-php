const getpages = document.getElementsByClassName('page');
console.log(getpages)
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

var datas = [];
var objkeys = ["fullname", "username", "email","address", "password", "comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(num) {


    getpages[num].classList.remove('hidden');

    console.log(getpages[num]);

    num === getpages.length - 1
        ? (nextbtn.textContent = 'Submit')
        : (nextbtn.textContent = 'Next');
}



function gonow(num) {


  curidx++;
  console.log(curidx)
  getpages[curidx-1].classList.add('hidden');

  

  showpage(curidx)

}

function* yeildfun() {
    var index = 0;

    while (index < objkeys.length) {
        yield function () {
            index++;
        }
    }
}

let gen = yeildfun();

function formvalid() {
    var getcurrinput = getpages[curidx].getElementsByTagName('input');
    // console.log(getcurrinput);
    // console.log(getcurrinput[0].value);
  
    for (var x = 0; x < getcurrinput.length; x++) {
      // console.log(getcurrinput[x].value);
      if (getcurrinput[x].value === '') {
        getcurrinput[x].classList.add('invalid');
        valid = false;
      } else {
       
        const keys = objkeys[gen.next().value];
        const values = getcurrinput[x].value;
        datas.push({ [keys]: values });
      }

    }

    return valid;

}



function submitbtn() {
    getform.submit();
  }
