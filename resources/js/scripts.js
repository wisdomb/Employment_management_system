document.getElementById('addEmployeeForm').addEventListener('submit', function (event) {
    var activeCheckbox = document.getElementById('active');
    if (!activeCheckbox.checked) {
        var confirmAdd = confirm('The employee is selected as not active. Do you want to continue?');
        if (!confirmAdd) {
            event.preventDefault();
        }
    }
});