document.addEventListener('DOMContentLoaded', function(){
        const dropdown = document.querySelector('.dropdown');
        const subBtn = document.querySelector('.submit-btn');
        dropdown.addEventListener('change', function(){
            subBtn.textContent = 'Add ' + dropdown.value;
        }) 
});