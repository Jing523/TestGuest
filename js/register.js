//等待页面加载完毕再执行
window.onload = function () {
    var faceimg = document.getElementById("faceimg");
    var code = document.getElementById("code");
    faceimg.onclick = function () {
        window.open('face.php', 'face', 'width=400,height=400,top=0,left=0,scrollbars=1');
    }
    code.onclick = function () {
        this.src = 'code.php?tm=' + Math.random();
    }

    //verify form
    var fm = document.getElementsByTagName('form')[0];
    fm.onsubmit = function () {
        //verify username to determine if it is legal
        if (fm.userName.value.length < 2 || fm.userName.value.length > 20) {
            alert('The length of username should be more than 2 and less than 20.');
            fm.userName.value = '';
            fm.userName.focus();
            return false;
        }
        if (/[<>\'\"]/.test(fm.userName.value)) {
            alert('username cannot contain special characters.');
            fm.userName.value = '';
            fm.userName.focus();
            return false;
        }

        //verify password to determine if it is legal
        if (fm.passWord.value.length < 6) {
            alert('The length of password should be more than 6.');
            fm.passWord.value = '';
            fm.passWord.focus();
            return false;
        }
        if (fm.passWord.value != fm.confirmPassword.value) {
            alert('These passwords do not match.');
            fm.confirmPassword.value = '';
            fm.confirmPassword.focus();
            return false;
        }

        //verify questions to determine if it is legal
        if (fm.question.value.length < 2 || fm.question.value.length > 40) {
            alert('The length of question should be more than 2 and less than 40.');
            fm.question.value = '';
            fm.question.focus();
            return false;
        }

        //verify answer to determine if it is legal
        if (fm.answer.value.length < 2 || fm.answer.value.length > 40) {
            alert('The length of answer should be more than 2 and less than 40.');
            fm.answer.value = '';
            fm.answer.focus();
            return false;
        }
        if (fm.answer.value == fm.question.value) {
            alert('The answer should be different from the question.');
            fm.answer.value = '';
            fm.answer.focus();
            return false;
        }

        //verify email to determine if it is legal
        if (!/^[\w\_\-\.]+@[\w\_\-\.]+(\.\w+)+$/.test(fm.email.value)) {
            alert('The email address is illegal.');
            fm.email.value = '';
            fm.email.focus();
            return false;
        }

        //verify qq number to determine if it is legal
        if (fm.qq.value != '') {
            if (!/^[1-9]{1}[0-9]{4,10}$/.test(fm.qq.value)) {
                alert('The qq number is illegal.');
                fm.qq.value = '';
                fm.qq.focus();
                return false;
            }
        }

        //verify url to determine if it is legal
        if (fm.url.value != '') {
            if (!/^https?:\/\/(\w+\.)?[\w\-\.]+(\.\w+)+$/.test(fm.url.value)) {
                alert('The url is illegal.');
                fm.url.value = '';
                fm.url.focus();
                return false;
            }
        }

        //verify security code to determine if it is legal
        if (fm.securityCode.value.length != 4) {
            alert('The security code should be 4 digit.');
            fm.securityCode.value = '';
            fm.securityCode.focus();
            return false;
        }
        return true;
    }
}