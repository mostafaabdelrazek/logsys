var signup = document.forms.signupform ,
    unm = signup.unm,
    eml = signup.eml,
    pwd = signup.pwd,
    pwdc= signup.pwdc,
    checker = {"username": 0, "email": 0, "password":0, "confirmpass":0},
    funm = document.getElementById('unm'),
    feml = document.getElementById('eml'),
    fpwd = document.getElementById('pwd'),
    fpwdc= document.getElementById('pwd-c');
function valid(name , min , max ,fieldname,nid,num){
    if(name.value.length < min || name.value.length > max){
        fieldname.innerHTML = nid+" max length"+max+" and min length "+min;
        checker[num] = 0;
    }else if(name.value.includes(">") || name.value.includes("<") || name.value.includes(" ")){
        fieldname.innerHTML = "bad input sympol or space";
        checker[num] = 0;
    }else{
        fieldname.innerHTML = "<p>keepgoing</p>";
        checker[num] = 1;
    }

}

function cross(){
var i;
    for(i=0;i<creat.length;i++){
       if(creat[i]!=2){
           i = 5;
       }
       break;
   }
   
    if( i == 5){
        document.getElementById("v-submit").innerHTML = "don't joke with me back and correct your inpuuts";
        return false;
    }
    else{
        return true;
    }
}    

unm.addEventListener("input" , function (){
    valid(this,6,20, funm,'username',0);
});
eml.addEventListener("input" , function (){
    valid(this,15,40,feml,'email',1);
});
pwd.addEventListener("input" , function (){
    valid(this,8,40, fpwd,'password',2);
    if(this.value !== pwdc.value){
        checker[3] = 0;
    }else{
        checker[3]=1;
    }
});
pwdc.addEventListener("input" , function () {
    if(this.value !== pwd.value){
        fpwdc.innerHTML = "not mathed";
        checker[3] = 0;
    }else{
        fpwdc.innerHTML = "<p>matched</p>";
        checker[3]=1;
    }
});