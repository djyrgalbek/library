function sign_in() {
    let admin__button = document.getElementById('admin__button');
    if(admin__button.innerHTML == 'Войти' || admin__button.innerHTML == 'Кирүү')
    {
        let login = prompt(lang['login_admin'], "");
        let password = prompt(lang['password_admin'], "");
        var flag;
    
        for (let i = 0; i < logins_admin.length; i++) {
            if (logins_admin[i].toLowerCase() == login.toLowerCase() &&
                passwords_admin[i] == password) {
                flag = true;
                getLoginAdmin(logins_admin[i]);
                getEnabled('control__button');
                getEnabled('list');
                create_cookies('admin', logins_admin[i]);
                break;
            }
            else {
                flag = false;
            }
        }
        getMessage(flag == true ? lang['success'] : lang['failure']);
    }
    else
    {
        let ask = confirm(lang['out']);
        if(ask)
        {
            delete_cookie('admin');
        }
        
    }
}

function getMessage(text) {
    alert(text);
}

function getLoginAdmin(log_admin) {
    document.getElementById('admin__button').innerHTML = log_admin;
}
function getEnabled(name)
{
    let control__button = document.getElementsByClassName(name);
    for (let k = 0; k < control__button.length; k++) {
        control__button[k].disabled = false;
    }
}
function create_cookies(key, value)
{
    document.cookie = key + '=' + value + '; path=/; expires=' + getData();
    //alert(document.cookie);
}
function delete_cookie(cookie_name){
    document.cookie = cookie_name + '=; path=/; expires=-1';
    location.reload();
}
function get_cookie (cookie_name)
{
  var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
 
  if (results)
    return ( unescape (results[2]));
  else
    return null;
}

function redirect()
{
    if(get_cookie('admin'))
    {
        getLoginAdmin(get_cookie('admin'));
        getEnabled('control__button');
        getEnabled('list');
    }
    else
    {
        getPage('index.php');
    }
}

function getDataAdmin()
{
    if(get_cookie('admin'))
    {
        getLoginAdmin(get_cookie('admin'));
        getEnabled('control__button');
        getEnabled('list');
    }
}
function getData()
{
    var date = new Date;
    date.setDate(date.getDate() + 3);
    var UTCstring = date.toUTCString();
    return UTCstring;
}

function getPage(page)
{
    location.href = page;
}

function clearForm(name)
{
    let elem = document.getElementsByClassName(name);
    for(let i = 0; i < elem.length; i++)
    {
        elem[i].value = '';
        elem[i].style.border = 'none';
    }
}
    
function getReg()
{
    let fullname = document.reg.fullname.value;
    let bilet = document.reg.bilet.value;
    let login = document.reg.login.value;
    let password = document.reg.password.value;

        $.ajax({
            type: "POST",
            url: "PHP/reg.php",
            data: {fullname: fullname, bilet: bilet, login: login, password: password}
        }).done(function(result)
            {
                if(result == 'true')
                {
                    alert(lang['new_user']);
                    location.href = "add_debt.php";
                }
                else
                {
                    alert(lang['old_user']);
                }
            });
}

function validate()
{   
    let fullname = document.reg.fullname;
    let bilet = document.reg.bilet;
    let login = document.reg.login;
    let password = document.reg.password;

    if(fullname.value!='' && bilet.value!='' && login.value!='' && password.value!='')
    {
        fullname.style.border = 'none';
        bilet.style.border = 'none';
        login.style.border = 'none';
        password.style.border = 'none';
        getReg();
    }

    if(fullname.value!='')
    {
        fullname.style.border = 'none';
    }
    else
    {
        fullname.style.border = '1px solid red';
    }

    if(bilet.value!='')
    {
        bilet.style.border = 'none';
    }
    else
    {
        bilet.style.border = '1px solid red';
    }

    if(login.value!='')
    {
        login.style.border = 'none';
    }
    else
    {
        login.style.border = '1px solid red';
    }

    if(password.value!='')
    {
        password.style.border = 'none';
    }
    else
    {
        password.style.border = '1px solid red';
    }
}

function checkUser(id, name)
{
    let index = document.getElementById(id).options.selectedIndex;
    document.getElementById(name).options[index].selected = true;
}
function check_form_list()
{
    let id_fullname = document.getElementById("users_fullname").options.selectedIndex;
    let id_bilet = document.getElementById("users_bilet").options.selectedIndex;
    let fullname = document.getElementById("users_fullname").options[id_fullname].text;
    let bilet = document.getElementById("users_bilet").options[id_bilet].value;

    if(fullname == lang['fullname'] && bilet == lang['library-card-number'])
    {
        alert(lang['chesk_list']);
    }
    else
    {
        openPage();
    }
}
function check_form_debt()
{
    let id_fullname = document.getElementById("users_fullname").options.selectedIndex;
    let id_bilet = document.getElementById("users_bilet").options.selectedIndex;
    let fullname = document.getElementById("users_fullname").options[id_fullname].text;
    let bilet = document.getElementById("users_bilet").options[id_bilet].value;

    let name_book= document.getElementById("name_book").value;
    let author= document.getElementById("author").value;
    let year= document.getElementById("year").value;
    let date_of_receiving= document.getElementById("date_of_receiving").value;
    let return_date= document.getElementById("return_date").value;
    
    let flag_arr = [];
    if(fullname == lang['fullname'] || bilet == lang['library-card-number'])
    {
        alert(lang['chesk_list']);
    }
    else
    {
        flag_arr[0] = true;
    }

    if(name_book == '' || author == '' || year == '' || date_of_receiving == '' || return_date == '')
    {
        alert(lang['empty_form']);
    }
    else
    {
        flag_arr[1] = true;
    }

    if(flag_arr[0] == true && flag_arr[1] == true)
    {
        addBook();
        let id_fullname = document.getElementById("users_fullname").options.selectedIndex;
        document.form_id.id_GET.value = ID_user[id_fullname - 1];
        document.form_id.submit();
    }
}

function addBook()
{
    let id_fullname = document.getElementById("users_fullname").options.selectedIndex;
    let name_book= document.getElementById("name_book").value;
    let author= document.getElementById("author").value;
    let year= document.getElementById("year").value;
    let date_of_receiving= document.getElementById("date_of_receiving").value;
    let return_date= document.getElementById("return_date").value;

        $.ajax({
            type: "POST",
            url: "PHP/debt.php",
            data: {ID: ID_user[id_fullname - 1], name_book: name_book, author: author, year: year, date_of_receiving: date_of_receiving,return_date: return_date} 
        }).done(function(result)
            {
                if(result)
                {
                    alert(lang['add_book']);
                }
            });
}

function clear_form_debt()
{
    document.getElementById("users_fullname").options[0].selected = true;
    document.getElementById("users_bilet").options[0].selected = true;
    document.getElementById("name_book").value = '';
    document.getElementById("author").value = '';
    document.getElementById("year").value = '';
    document.getElementById("date_of_receiving").value = '';
    document.getElementById("return_date").value = '';
}
var flag_login = false;
function showLogin()
{
    if(flag_login == true)
    {
        document.getElementById('loginInfo').innerHTML = lang['look_login_pass'];
        flag_login = false;
    }
    else
    {
        document.getElementById('loginInfo').innerHTML = 'Логин: ' + global_login_user + '; Пароль: ' + global_login_password;
        flag_login = true;
    }
}

function openPage()
{
    let id_fullname = document.getElementById("users_fullname").options.selectedIndex;
    document.form_id.id_GET.value = ID_user[id_fullname - 1];
    document.form_id.submit();
}

function getLanguage(lang)
{
    if(lang == 'ru_RU')
    {
        create_cookies('language', 'kg_KG');
    }
    else if(lang == 'kg_KG')
    {
        create_cookies('language', 'ru_RU');
    }
    location.reload();
}

function validateLogin(page)
{
    let admin__button = document.getElementById('admin__button');
    if(admin__button.innerHTML == 'Войти' || admin__button.innerHTML == 'Кирүү')
    {
        alert(lang['login_in_system']);
    }
    else
    {
        getPage(page);
    }
}