const getpages = document.getElementsByClassName('page');
console.log(getpages)
const getform = document.getElementById('form');
const prevbtn = document.getElementById('prev');
const nextbtn = document.getElementById('next');
const footer = document.getElementById('footer');
const getrstcontainer = document.getElementById('result-container');

var datas = [];
var objkeys = ["fullname", "username", "email", "address", "phone", "password", "comfirm"];


var curidx = 0;

showpage(curidx);

function showpage(num) {


    getpages[num].classList.remove('hidden');

    console.log(getpages[num]);

    num === 0 ? (prevbtn.style.display = "none") : (prevbtn.style.display = "block");
    num === 0 ? (footer.classList.remove('hidden')) : (footer.classList.add('hidden'));


    if (num === getpages.length - 1) {
        nextbtn.innerHTML = `<button type="submit"
        class="w-full bg-stone-200 text-gray-500 hover:opacity-80 hover:text-gray-800"
        onclick="submitbtn()">Submit </button>`;
    } else {
        nextbtn.textContent = 'Next'
    }
}


function backnow(num) {

    curidx--;
    // console.log(curidx)
    getpages[curidx + 1].classList.add('hidden');


    showpage(curidx)
}

function gonow(num) {



    if (num === 1 && !formvalid()) return false;
    curidx++;
    console.log(curidx)
    getpages[curidx - 1].classList.add('hidden');

    if (curidx >= getpages.length) {
        nextbtn.style.display = "none";
        // getform.submit();
        getrstcontainer.style.display = 'block';
        result(datas);

        return false;

    }

    console.log(curidx);
    showpage(curidx)

}


function* genfun() {
    var index = 0;

    while (index < objkeys.length) {
        yield index++;
    }
}

let gen = genfun();

// console.log(gen.next().value);

function formvalid() {
    var valid = true;
    var getcurrinput = getpages[curidx].getElementsByTagName('input');
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
