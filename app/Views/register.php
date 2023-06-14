<div class="container mt-5 d-flex align-items-center justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <h3 class="text-center">Register</h3>
            <form id="register-form" method="POST" action="<?= base_url('register') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama">
                    <small id="nameErr" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Masukkan Email">
                    <small id="emailErr" class="form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <small id="passErr" class="form-text text-danger"></small>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="aggrement">
                    <label class="form-check-label" for="exampleCheck1">Saya menyetujui bahwa akan register di sistem ini</label>
                    <small id="aggErr" class="form-text text-danger"></small>
                </div>
                <a id="btn-submit" class="btn btn-primary mt-3">Daftar</a>
            </form>
        </div>
    </div>
</div>

<script>
    let form = document.getElementById('register-form')
    let nameInput = document.getElementById('nama')
    let emailInput = document.getElementById('email')
    let passwordInput = document.getElementById('password')
    let aggrement = document.getElementById('aggrement')

    let btnSubmit = document.getElementById('btn-submit')

    let errorName = document.getElementById('nameErr')
    let errorEmail = document.getElementById('emailErr')
    let errorPassword = document.getElementById('passErr')
    let errorAgg = document.getElementById('aggErr')

    btnSubmit.onclick = function() {
        if (!isValidName(nameInput.value) || !isValidEmail(emailInput.value) || !isValidPassword(passwordInput.value) || !isCheckedAggrement()) {
            if (!isValidName(nameInput.value)) {
                errorName.innerText = 'Nama harus lebih dari 3 karakter'
            } else {
                errorName.innerText = ''
            }

            if (!isValidEmail(emailInput.value)) {
                errorEmail.innerText = "Email tidak valid"
            } else {
                errorEmail.innerText = ''
            }

            if (!isValidPassword(passwordInput.value)) {
                errorPassword.innerText = "Password minimal 8 karakter"
            } else {
                errorPassword.innerText = ""
            }

            if (!isCheckedAggrement()) {
                errorAgg.innerText = "Anda harus mencentang pernyataan ini"
            } else {
                errorAgg.innerText = ""
            }
        } else {
            form.submit()
        }

    }

    function isValidName(nama) {
        return nama.length >= 3
    }

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        return emailRegex.test(email)
    }

    function isValidPassword(password) {
        return password.length >= 8
    }

    function isCheckedAggrement() {
        return aggrement.checked
    }
</script>