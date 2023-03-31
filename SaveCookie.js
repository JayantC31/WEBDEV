function saveUsernameCookie() {
	// Get the username input element and its value
	const usernameInput = document.getElementById('username');
	const username = usernameInput.value.trim();

	// Check if the username input is valid
	const invalidChars = /[!@#%&*()+=^{}[\]\-;:'<>?\/]/;
	if (invalidChars.test(username)) {
		const usernameError = document.getElementById('username-error');
		usernameError.innerText = 'Invalid characters detected';
		return false;
	} else {
		const usernameError = document.getElementById('username-error');
		usernameError.innerText = '';
	}

	// Save the username as a cookie with a 1-day expiration time
	document.cookie = `username=${username}; expires=${new Date(Date.now() + 86400e3).toUTCString()}`;

	// Continue with the form submission and redirect to save_cookie.php
	return true;
}
