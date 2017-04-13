//register functions
 
//function to reveal school dropdown  
function reveal_schools()
{
        
    if(document.getElementById('roles_id').value === '1' || document.getElementById('roles_id').value === '2')
    {
            document.getElementById('school_id').form['1'].style.display='block';
            disable_packages();
    } else {
            document.getElementById('school_id').form['1'].style.display='none';
            disable_packages();
    }

}

function reveal_entrepreneur_form()
{
    if(document.getElementById('roles_id').value === '3')
    {
        document.getElementById('companies').form['3'].style.display='block';
        document.getElementById('aEmail').form['6'].style.display='none';
        document.getElementById('bEmail').form['7'].style.display='none';
        document.getElementById('bEmail').form['8'].style.display='block';   
    } else {
        document.getElementById('companies').form['3'].style.display='none';
        document.getElementById('aEmail').form['6'].style.display='block';
        document.getElementById('bEmail').form['7'].style.display='block';
        document.getElementById('bEmail').form['8'].style.display='none';
        
    }
}

function reveal_entrepreneur_email()
{
    if(document.getElementById('roles_id').value === '3')
    {
        
    } else {
        
    }
}

//function to disable packages(silver/gold) for Student and Docent
function disable_packages()
{
    if(document.getElementById('roles_id').value === '1' || document.getElementById('roles_id').value === '2')
    {
        document.getElementById('products_id').options[0].style.display='none';
        document.getElementById('products_id').options[2].style.display='none';
        document.getElementById('products_id').options[3].style.display='none';
        document.getElementById('products_id').selectedIndex = '1';
        document.getElementById('products_id').disabled = true;  
    } else {
        document.getElementById('products_id').options[0].style.display='block';
        document.getElementById('products_id').options[2].style.display='block';
        document.getElementById('products_id').options[3].style.display='block';
        document.getElementById('products_id').selectedIndex = '';
        document.getElementById('products_id').disabled = false;
    }
}

//function to automatically put email domains(@example.com) in input_field
function set_input_value()
{

    if(document.getElementById('school_id').value==='1'){
        document.getElementById('bEmail').value='@fcroc.nl';
        document.getElementById('bEmail').readOnly = true;

    }
    if(document.getElementById('school_id').value==='2'){
        document.getElementById('bEmail').value='@student.nhl.nl';
        document.getElementById('bEmail').readOnly = true;
    }
    if(document.getElementById('school_id').value==='3'){
        document.getElementById('bEmail').value='@edu.rocfriesepoort.nl';
        document.getElementById('bEmail').readOnly = true;
    }
    if(document.getElementById('school_id').value==='4'){
        document.getElementById('bEmail').value='@gmail.com';
        document.getElementById('bEmail').readOnly = true;
    }

}

//fuction to combine the two email input_fields
function fuse_email()
{
    var aEmail = document.getElementById('aEmail').value;
    var bEmail = document.getElementById('bEmail').value;
    var result = document.getElementById('email');
    var email = aEmail + bEmail;
    result.value = email;  


    console.log(email);
}
