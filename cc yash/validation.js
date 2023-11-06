const form = document.getElementById('reg-form');
form.addEventListener('submit', function(event) {
	event.preventDefault();

	// Get form inputs
	const firstName = form.elements['firstname'];
	const lastName = form.elements['lastname'];
	const email = form.elements['email'];
	const password = form.elements['password'];
	const confirmPassword = form.elements['confirm-password'];
	const birthdate = form.elements['birthdate'];
	const gender = form.elements['gender'];


	// Validate inputs
	const isValidFirstName = validateName(firstName);
	const isValidLastName = validateName(lastName);
	const isValidEmail = validateEmail(email);
	const isValidPassword = validatePassword(password);
	const isValidConfirmPassword = validateConfirmPassword(password, confirmPassword);
	const isValidBirthdate = validateBirthdate(birthdate);
	const isValidGender = validateGender(gender);

	// If all inputs are valid, submit form
	if (isValidFirstName && isValidLastName && isValidEmail && isValidPassword && isValidConfirmPassword && isValidBirthdate && isValidGender) {
		form.submit();
	}
});

function validateName(input) {
	const regex = /^[a-zA-Z]+$/;
	if (input.value.trim() === '' || !regex.test(input.value)) {
		input.classList.add('invalid');
		alert('flase');
	} else {
		input.classList.remove('invalid');
		return true;
	}
}

function validateEmail(input) {
	const regex = /^\S+@\S+\.\S+$/;
	if (input.value.trim() === '' || !regex.test(input.value)) {
		input.classList.add('invalid');
		return false;
	} else {
		input.classList.remove('invalid');
		return true;
	}
}

function validatePassword(input) {
	if (input.value.trim() === '' || input.value.length < 6) {
		input.classList.add('invalid');
		return false;
	} else {
		input.classList.remove('invalid');
		return true;
	}
}

function validateConfirmPassword(password, confirmPassword) {
	if (confirmPassword.value.trim() === '' || confirmPassword.value !== password.value) {
		confirmPassword.classList.add('invalid');
		return false;
	} else {
		confirmPassword.classList.remove('invalid');
		return true;
	}
}

function validateBirthdate(input) {
	if (input.value.trim() === '') {
		input.classList.add('invalid');
		return false;
	} else {
		input.classList.remove('invalid');
		return true;
	}
}

function validateGender(input) {
	if (input.value === '') {
		input.classList.add('invalid');
		return false;
	} else {
		input.classList.remove('invalid');
		return true;
	}
}
