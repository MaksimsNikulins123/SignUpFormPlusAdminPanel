const email = document.getElementById('email');
const form = document.getElementById('form');
const submit = document.getElementById('submit');
const errorElement = document.getElementById('error');
const checkbox = document.querySelector('.checkbox');

errorElement.innerHTML = 'Email address is required';
checkbox.checked = false;
document.getElementById('submit').disabled=true;

email.addEventListener("keyup", () => {
    checkingInputs();
});
checkbox.addEventListener('click', () => {
    checkingCheckboxes();
});

function checkingInputs()
{  
    if(email.value !== '')
    {
        let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(email.value.match(validRegex))
        {
            let array = email.value.split('.');
            let country = array[array.length -1];
            if(country !== 'co')
            {
                if(checkbox.checked)
                {
                    errorElement.innerHTML = '';
                    document.getElementById('submit').disabled=false;
                }
                else
                {
                    errorElement.innerHTML = 'You must accept the terms and conditions';
                    document.getElementById('submit').disabled=true;
                }
            }
            else
            {
                errorElement.innerHTML = 'We are not accepting subscriptions from Colombia emails';
                document.getElementById('submit').disabled=true;
            }
        }
        else
        {
            errorElement.innerHTML = 'Please provide a valid e-mail address';
            document.getElementById('submit').disabled=true; 
        }
    }
    else
    {
        errorElement.innerHTML = 'Email address is required';
        document.getElementById('submit').disabled=true;
    }
}

function checkingCheckboxes()
{
    if(!checkbox.checked)
    {
        errorElement.innerHTML = 'You must accept the terms and conditions';
        document.getElementById('submit').disabled=true;
    }
    else
    {       
        errorElement.innerHTML = '';
        document.getElementById('submit').disabled=true;
        checkingInputs();
    }
}
