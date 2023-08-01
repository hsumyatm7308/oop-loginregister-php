const getpages = document.getElementsByClassName('page');
const getform = document.getElementById('form');
const nextbtn = document.getElementById('next');

var datas = [];
obj = ["fullname", "username", "email", "password", "comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(num) {

    getpages[num].style.display = "block";


    num === getpages.length - 1
        ? (nextbtn.textContent = 'Submit')
        : (nextbtn.textContent = 'Next');
}



function gonow(num) {



    if (num === 1) return false;

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

function* yeildfun() {
    var index = 0;

    while (index < obj.length) {
        yield function () {
            index++;
        }
    }
}

let gen = yeildfun();

function formvalid() {
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


