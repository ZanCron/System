var alert = document.getElementById('alert');
    if (alert) {
        setTimeout(function() {
            alert.classList.remove('show'); 
            alert.classList.add('fade');   
            setTimeout(function() {
                alert.remove();         
            }, 500);  
        }, 5000);  
}

function allowOnlyNumbers(event) {
    let inputValue = event.target.value;
    inputValue = inputValue.replace(/[^0-9]/g, '');
    event.target.value = inputValue;
}


        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#floatingPassword');

        togglePassword.addEventListener('click', function (e) {
            const type = password.type === 'password' ? 'text' : 'password';
            password.type = type;
            this.innerHTML = type === 'password' 
                ? '<i class="bi bi-eye fs-5"></i>' 
                : '<i class="bi bi-eye-slash fs-5"></i>';
        });

        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#floatingConfirmPassword');

        toggleConfirmPassword.addEventListener('click', function (e) {
            const type = confirmPassword.type === 'password' ? 'text' : 'password';
            confirmPassword.type = type;
            this.innerHTML = type === 'password' 
                ? '<i class="bi bi-eye fs-5"></i>' 
                : '<i class="bi bi-eye-slash fs-5"></i>';
        });

        rpassword.addEventListener('input', function () {
            if (password.value !== rpassword.value) {
                passwordError.textContent = 'Passwords do not match';
            } else if (password.value.length < 12) {
                passwordError.textContent = 'Password must be at least 12 characters long';
            } else {
                passwordError.textContent = '';
            }
        });


