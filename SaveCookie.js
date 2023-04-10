// Used to save the username as a cookie to be used throughout the game
function saveUsernameCookie() {
	// Get the username input element and its value
	const usernameInput = document.getElementById('username');
	const username = usernameInput.value.trim();
	// Check if the username is valid by checking the characters
	const invalidChars = /[!@#%&*()+=^{}[\]\-;:'<>?\/]/;
	if (invalidChars.test(username)) {
		const usernameError = document.getElementById('username-error');
		usernameError.innerText = 'Invalid characters detected';
		console.log('Invalid characters detected');
		return false;
	} else {
		const usernameError = document.getElementById('username-error');
		usernameError.innerText = '';
		
	}
	console.log("Saving username cookie...");
	// Save the username as a cookie with a 1 day expiration time
	document.cookie = `username=${username}; expires=${new Date(Date.now() + 86400e3).toUTCString()}`;

	// Continue with the form submission by returning true
	return true;
}
