function signup(){
	const fullname = document.getElementById('fullname').value.trim();
	const email = document.getElementById('email').value.trim();
	const password = document.getElementById('password').value;
	const semester = document.getElementById('semester').value;
	const msgEl = document.getElementById('signupMessage');
	const btn = document.getElementById('signupBtn');

	msgEl.textContent = '';
	btn.disabled = true;

	const params = new URLSearchParams();
	params.append('fullname', fullname);
	params.append('email', email);
	params.append('password', password);
	params.append('semester', semester);

	fetch('php/signup.php', {
		method: 'POST',
		headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
		body: params.toString()
	})
	.then(async res => {
		const text = (await res.text()).trim();
		if (res.ok) {
			try {
				const data = JSON.parse(text);
				if (data.success) {
					// Auto-login and redirect based on semester
					const semester = data.semester.toLowerCase();
					if (semester.includes('3')) {
						window.location.href = 'semster3rd/dashboard.html';
					} else if (semester.includes('4')) {
						window.location.href = 'semster4/dashboard4th.html';
					} else {
						window.location.href = 'login.html';
					}
				} else {
					msgEl.textContent = 'Signup failed.';
				}
			} catch (e) {
				msgEl.textContent = 'Server error.';
			}
		} else {
			if (text) msgEl.textContent = text;
			else if (res.status === 409) msgEl.textContent = 'Email already registered.';
			else if (res.status === 400) msgEl.textContent = 'Invalid input.';
			else msgEl.textContent = 'Server error. Try again later.';
		}
	})
	.catch(err => {
		msgEl.textContent = 'Network error. Check your connection.';
	})
	.finally(() => { btn.disabled = false; });
}