function login(){
    const email = document.getElementById('login-email').value.trim();
    const password = document.getElementById('login-password').value;
    const msgEl = document.getElementById('loginMessage');
    const btn = document.getElementById('loginBtn');

    msgEl.textContent = '';
    btn.disabled = true;

    const params = new URLSearchParams();
    params.append('email', email);
    params.append('password', password);

    fetch('php/login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: params.toString()
    })
    .then(async res => {
        const text = (await res.text()).trim();
        console.log("Response status:", res.status, "Body:", text);
        
        if (res.ok) {
            try {
                const data = JSON.parse(text);
                if (data.success) {
                    // Redirect based on semester
                    const semester = data.semester.toLowerCase();
                    if (semester.includes('3')) {
                        window.location.href = 'semster3rd/dashboard.html';
                    } else if (semester.includes('4')) {
                        window.location.href = 'semster4/dashboard4th.html';
                    } else {
                        window.location.href = 'dashboard.html';
                    }
                } else {
                    msgEl.textContent = 'Login failed.';
                }
            } catch (e) {
                msgEl.textContent = 'Server error.';
            }
        } else {
            if (text) msgEl.textContent = text;
            else if (res.status === 401) msgEl.textContent = 'Invalid email or password.';
            else if (res.status === 400) msgEl.textContent = 'Invalid input.';
            else msgEl.textContent = 'Server error. Try again later.';
        }
    })
    .catch(err => {
        msgEl.textContent = 'Network error. Check your connection.';
    })
    .finally(() => { btn.disabled = false; });
}